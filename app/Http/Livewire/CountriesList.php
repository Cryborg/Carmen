<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Update\Cities;

class CountriesList extends Component
{
    public $countries;
    public $cities;

    public $selectedCountry;
    public $selectedCity;

    public function mount()
    {
        $this->countries = Countries::all()->toArray();
        $this->cities = null;

        if ($this->selectedCountry !== null) {
            $this->cities = Countries::where('cca', $this->selectedCountry)->first()->cities;
        }
    }

    public function render()
    {
        return view('livewire.countries-list');
    }
}
