<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Models\Country;
use App\Models\Suspect;

class NewInvestigation extends ComponentBase
{
    public function render()
    {
        return view('livewire.new-investigation');
    }

    /**
     * Start a new investigation
     */
    public function newInvestigation(): void
    {
        if (!$this->authUser->investigations->first()) {
            // Pick up 2 random countries: one to start in, the other for the next destination
            $countries = Country::inRandomOrder()->limit(2)->get('cca3');

            // Create the investigation
            $this->authUser->investigations()
                           ->create(
                               [
                                   'suspect_id' => Suspect::inRandomOrder()->first()->id,
                                   'loc_current' => $countries->first()->cca3,
                                   'loc_next' => $countries->last()->cca3,
                               ]
                           );
        }

        // Forget data from previous game
        session()->forget('filters');

        redirect('/play');
    }
}
