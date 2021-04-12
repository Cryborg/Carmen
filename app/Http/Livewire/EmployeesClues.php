<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Classes\TextModifier;
use App\Models\Conversation;
use App\Models\Employee;
use App\Models\Investigation;

class EmployeesClues extends ComponentBase
{
    protected $listeners = ['selectedBuilding'];

    public $buildingEmployees;

    public $displayedClue = [];

    public function render()
    {
        return view('livewire.employees-clues');
    }

    public function selectedBuilding($cityBuilding)
    {
        $this->buildingEmployees = Employee::where('building_city_id', $cityBuilding)->get();
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

        if ($dialog !== null) {
            $this->displayedClue[$employee->id] = $this->listConversations($currentInvestigation, $employee);
        } else {
            $actualLocation = $employee->city->country->cca2;

            // Check if the player is in the right country
            if ($actualLocation !== $currentInvestigation->loc_current
                && $actualLocation !== $currentInvestigation->loc_next) {
                $translations = trans('clues.wrong_place');
                $this->displayedClue[$employee->id] = [
                    'wrong_place' => $translations[array_rand($translations)],
                ];
            } else {
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

                $this->displayedClue[$employee->id] = $this->listConversations($currentInvestigation, $employee);;
            }
        }
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

        $randomClue = trans('clues.' . $clue);

        if (is_array(current($randomClue))) {
            $translations = trans('clues.' . $clue . '.' . $suspect->$clue);
        } else {
            $translations = $randomClue;
        }

        return TextModifier::getModifiedText($translations[array_rand($translations)], $investigation);
    }

    public function listConversations(Investigation $investigation, Employee $employee)
    {
        $conversations = $investigation->conversations()
            ->where('employee_id', $employee->id)
            ->orderBy('updated_at')
            ->get();

        $listConversations = [];

        $conversations->each(function (Conversation $conversation) use (&$listConversations) {
            $listConversations[$conversation->clue] = $conversation->dialog;
        });

        return $listConversations;
    }
}
