<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
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
        if (!$this->authUser->investigation) {
            $this->authUser->investigation()
                           ->create(
                               [
                                   'suspect_id' => Suspect::inRandomOrder()
                                                          ->first()->id,
                               ]
                           );
        }

        redirect('/play');
    }
}
