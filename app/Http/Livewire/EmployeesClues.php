<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Classes\TextModifier;
use App\Models\Conversation;
use App\Models\Employee;
use App\Models\Investigation;
use App\Models\Specialty;

class EmployeesClues extends ComponentBase
{
    protected $listeners = ['selectedBuilding'];

    public $buildingEmployees;

    // Clues displayed for each employee
    public $displayedClue = [];

    public $hideCluesButtons = [];

    public function render()
    {
        return view('livewire.employees-clues');
    }

    public function selectedBuilding($cityBuilding)
    {
        $this->buildingEmployees = Employee::where('building_city_id', $cityBuilding)->get();

        $currentInvestigation = $this->authUser->investigations->first();

        $this->buildingEmployees->each(function ($employee) use($currentInvestigation) {
            $this->displayedClue[$employee->id] = $this->listConversations($currentInvestigation, $employee);;
        });

    }

    public function displayClue(Employee $employee, $clue)
    {
        $currentInvestigation = $this->authUser->investigations->first();
        $conversations = $currentInvestigation->conversations();
        $dialog = optional(
                      optional(
                          $conversations
                              ->where('employee_id', $employee->id)
                              ->where('clue', $clue)
                      )->first()
                  )->dialog;

        if ($dialog === null) {
            $actualLocation = $employee->city->country->cca2;

            // Check if the player is in the right country
            if ($actualLocation !== $currentInvestigation->loc_current//&& $actualLocation !== $currentInvestigation->loc_next
                ) {
                $clue = 'wrong_place';
            }

            $newDialog = $this->getClueDialog($currentInvestigation, $clue);

            $conversations->updateOrCreate([
                    'employee_id' => $employee->id,
                    'clue' => $clue,
                ],
                                       [
                    'employee_id' => $employee->id,
                    'clue' => $clue,
                    'dialog' => $newDialog,
                ]
            );
        }

        $this->displayedClue[$employee->id] = $this->listConversations($currentInvestigation, $employee);;
    }

    /**
     * Returns a random clue, taking into account the subject configured
     * for the employee building
     *
     * @param \App\Models\Investigation $investigation
     * @param string                    $clue
     *
     * @return string
     */
    public function getClueDialog(Investigation $investigation, string $clue): string
    {
        $suspect = $investigation->suspect;

        $clues = trans('clues.' . $clue);

        if (is_array(current($clues))) {
            $translations = trans('clues.' . $clue . '.' . $suspect->$clue);
        } else {
            $translations = $clues;
        }

        // Check if there are some more clues in database about country-specific clues
        if ($clue === 'destination') {
            $specialties = Specialty::where('country', $investigation->loc_next)
                ->where('approved_at', '!=', null)
                ->get();

            $dbClues = $specialties->pluck('clues');

            $translations = array_merge($translations, ...$dbClues);
        }

        return TextModifier::getModifiedText($translations[array_rand($translations)], $investigation);
    }

    public function listConversations(Investigation $investigation, Employee $employee): array
    {
        $conversations = $investigation->conversations()
            ->where('employee_id', $employee->id)
            ->orderBy('updated_at')
            ->get();

        $listConversations = [];

        $conversations->each(function (Conversation $conversation) use ($employee, &$listConversations) {
            $listConversations[$conversation->clue] = $conversation->dialog;

            $this->hideCluesButtons[$employee->id][] = $conversation->clue;
        });

        return $listConversations;
    }
}
