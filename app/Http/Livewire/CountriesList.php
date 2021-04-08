<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Livewire\Component;

class CountriesList extends Component
{
    public $countries;
    public $cities;

    public $selectedCountry;
    public $selectedCity;

    public function mount()
    {
        $countries = Country::all();

        foreach ($countries as $country) {
            $country->name = trans('countries.' . $country->cca3);
        }

        $this->countries = $countries;
        $this->cities = null;

        if ($this->selectedCountry !== null) {
            $this->cities = Country::find($this->selectedCountry)->cities;
        }
    }

    public function render()
    {
        return view('livewire.countries-list');
    }
}
