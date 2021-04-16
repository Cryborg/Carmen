<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Models\Country;
use App\Models\Suspect;

class NewInvestigation extends ComponentBase
{
    public bool $investigationInProgress = false;

    public $listeners = ['closeInvestigation'];

    public function mount()
    {
        $this->investigationInProgress = $this->authUser->investigations()->count() > 0;
    }

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
            $countries = Country::inRandomOrder()->limit(2)->get('cca2');

            // Create the investigation
            $this->authUser->investigations()
                           ->create(
                               [
                                   'suspect_id' => Suspect::inRandomOrder()->first()->id,
                                   'loc_current' => $countries->first()->cca2,
                                   'loc_next' => $countries->last()->cca2,
                               ]
                           );
        }

        // Forget data from previous game
        session()->forget('filters');

        redirect('/play');
    }

    public function closeInvestigation()
    {
        $this->authUser->investigations->first()->delete();

        $this->investigationInProgress = false;
    }
}
