<?php

namespace App\Models;

use App\Classes\TextModifier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\Auth;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $name;
    public $dialog;

    public static function boot()
    {
        parent::boot();

        static::retrieved(function($model)
        {
            $model->name = trans('common.employee');

            $loggedUser = Auth::user();
            $currentInvestigation = $loggedUser->investigations->first();
            $conversations = $currentInvestigation->conversations();
            $dialog = optional(
                optional(
                    $conversations->where('employee_id', $model->id)
                )->first()
            )->dialog;

            if ($dialog !== null) {
                $model->dialog = $dialog;
            } else {
                $newDialog = $model->getClueDialog($currentInvestigation, $model);
                $model->dialog = $newDialog;

                $conversations->create(
                    [
                        'employee_id' => $model->id,
                        'dialog' => $newDialog,
                    ]
                );

            }
        });
    }

    /**
     * Returns a random clue, taking into account the subject configured
     * for the employee building
     *
     * @param \App\Models\Investigation $investigation
     * @param \App\Models\Employee      $model
     *
     * @return string
     */
    public function getClueDialog(Investigation $investigation, Employee $model): string
    {
        // Check if the player is in the right country
        $actualLocation = $model->city->country->cca2;
        if ($actualLocation !== $investigation->loc_current && $actualLocation !== $investigation->loc_next) {
            $translations = trans('clues.wrong_place');
            return $translations[array_rand($translations)];
        }

        $clues = $model->building->clues;
        $suspect = $investigation->suspect;

        $randomClue = $clues[array_rand($clues)];

        $clue = trans('clues.' . $randomClue);

        if (is_array(current($clue))) {
            $translations = trans('clues.' . $randomClue . '.' . $suspect->$randomClue);
        } else {
            $translations = $clue;
        }

        return TextModifier::getModifiedText($translations[array_rand($translations)], $investigation);
    }

    public function building(): HasOneThrough
    {
        return $this->hasOneTHrough(
            Building::class,
            BuildingCity::class,
            'id',
            'id',
            'building_city_id',
            'building_id',
        );
    }

    public function city(): HasOneThrough
    {
        return $this->hasOneTHrough(
            City::class,
            BuildingCity::class,
            'id',
            'id',
            'building_city_id',
            'city_id',
        );
    }
}
