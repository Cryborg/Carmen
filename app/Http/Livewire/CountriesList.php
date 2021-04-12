<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Collection;

class CountriesList extends ComponentBase
{
    protected $listeners = ['selectedCity'];
    protected const NB_DESTINATIONS = 4;

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
        $this->countries = Country::inRandomOrder()->limit(self::NB_DESTINATIONS)->get();
        $this->cities = collect();
        $this->buildings = collect();

        // Add the next destination to the countries list, if it is not there yet
        $investigation = $this->authUser->investigations()->firstOrFail();
        $currentCountries = Country::whereIn('cca3', [
            $investigation->loc_current,
            $investigation->loc_next
        ])->get();
        $this->countries = $this->countries->merge($currentCountries)->sort();

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
     * @param int $newCountry
     */
    public function updatedSelectedCountry(int $newCountry)
    {
        $country = Country::find($newCountry);
        $this->cities = $country->cities;
        $this->selectedCity = null;

        // Save the new location...
        $investigation = $this->authUser->investigations->first();
        $investigation->loc_current = $country->cca3;

        // ...and find a new one
        $investigation->loc_next = Country::inRandomOrder()->limit(1)->first()->cca3;
        $investigation->save();

        // Refresh the list of available destinations...
        $countries = Country::inRandomOrder()->limit(self::NB_DESTINATIONS)->get();
        $currentCountries = Country::whereIn('cca3', [
            $investigation->loc_current,
            $investigation->loc_next
        ])->get();

        // ...and add the current one, and the next one.
        $this->countries = $countries->merge($currentCountries)->sort();

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
