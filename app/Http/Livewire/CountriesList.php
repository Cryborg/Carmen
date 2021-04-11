<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Collection;

class CountriesList extends ComponentBase
{
    protected $listeners = ['selectedCity'];

    public ?Collection $countries;
    public ?Collection $cities;
    public ?Collection $buildings;

    public ?int $selectedCountry = null;
    public ?int $selectedCity = null;

    public $rules = [
        'selectedCountry' => 'exists:countries',
        'selectedCity'    => 'exists:cities',
    ];

    public function mount()
    {
        $this->countries = Country::all()->sort();
        $this->cities = collect();
        $this->buildings = collect();

        // Place the player in the current location
        if ($this->selectedCountry === null) {
            $currentLocation       = $this->authUser->investigations->first()->loc_current;
            $currentCountry        = Country::where('cca3', $currentLocation)->first();
            $this->selectedCountry = $currentCountry->id;
        }

        // Load the cities so that they are displayed
        $this->cities = Country::find($this->selectedCountry)->cities;
    }

    /**
     * Triggered when the $selectedCountry is changed
     *
     * @param int $country
     */
    public function updatedSelectedCountry(int $country)
    {
        $this->cities = Country::find($country)->cities;
        $this->selectedCity = null;
        $this->emit('selectedBuilding', null);
    }

    /**
     * Triggered when the $selectedCity is changed
     *
     * @param \App\Models\City $city
     */
    public function selectedCity(City $city)
    {
        if (!is_null($city)) {
            $this->buildings = $city->buildings;
            $this->selectedCity = $city->id;
            $this->emit('selectedBuilding', null);
        }
    }

    public function render()
    {
        return view('livewire.countries-list');
    }
}
