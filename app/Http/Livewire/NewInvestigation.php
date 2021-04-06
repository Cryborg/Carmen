<?php

namespace App\Http\Livewire;

use App\Models\Suspect;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewInvestigation extends Component
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
        Auth::user()->investigation()->create([
            'suspect_id' => Suspect::inRandomOrder()->first()->id,
        ]);
    }
}
