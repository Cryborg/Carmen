<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contribute extends Component
{
    protected $listeners = ['show'];

    public bool $showCreateClue = false;
    public bool $showManageCountries = false;

    public function render()
    {
        return view('livewire.contribute');
    }

    public function show($option) {
        // Reset all values
        $this->showCreateClue = false;
        $this->showManageCountries = false;

        $this->$option = true;
    }
}
