<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Models\City;
use App\Models\Country;
use App\Models\Investigation;
use Illuminate\Support\Collection;

class CountriesList extends ComponentBase
{
    protected $listeners = ['selectedCountry' => 'updatedSelectedCountry', 'selectedCity'];

    protected const NB_DESTINATIONS = 2;

    public ?Investigation $investigation = null;

    public ?Collection $countries;
    public ?Collection $cities;
    public ?Collection $buildings;

    public ?string $selectedCountry = null;
    public ?int $selectedCity = null;

    public $rules = [
        'selectedCountry' => 'exists:countries',
        'selectedCity'    => 'exists:cities',
    ];

    public function mount()
    {
        $this->investigation = $this->authUser->investigations->first();
        $this->countries = $this->getCountriesList();

        // Place the player in the current location
        if ($this->selectedCountry === null) {
            $this->selectedCountry = $this->investigation->loc_current;
        }

        // Load the cities so that they are displayed
        $this->cities = Country::where('cca2', $this->selectedCountry)->first()->cities;

        $firstCity = $this->cities->first();
        $this->selectedCity = $firstCity->id;
        $this->buildings = $firstCity->buildings;
    }

    /**
     * Triggered when the $selectedCountry is changed
     *
     * @param Country $country
     */
    public function updatedSelectedCountry(Country $country)
    {
        $this->cities = $country->cities;
        $this->selectedCity = null;
        $this->selectedCountry = $country->cca2;

        if ($country->cca2 === $this->investigation->loc_next) {
            // Save the new location...
            $this->investigation->loc_current = $country->cca2;

            // ...and find a new one
            $nextCountry = Country::inRandomOrder()->limit(1)->first();
            $this->investigation->loc_next = $nextCountry->cca2;
            $this->investigation->save();

            // Refresh the list of available destinations...
            $countries = Country::inRandomOrder()
                ->limit(self::NB_DESTINATIONS)
                ->get();
            $currentCountries = Country::whereIn(
                'cca2',
                [
                    $this->investigation->loc_current,
                    $this->investigation->loc_next,
                ]
            )->get();

            // ...and add the current one, and the next one.
            $this->countries = $countries->merge($currentCountries)->sort();
            $this->selectedCountry = $country->cca2;
        }

        $this->emit('selectedCity', $this->cities->first()->id);
        //$this->emit('selectedBuilding', $this->cities->first()->buildings->first()->pivot->id);
    }

    /**
     * Triggered when the $selectedCity is changed
     *
     * @param City $city
     */
    public function selectedCity(City $city)
    {
        $this->selectedCity = $city->id;
        $this->buildings = $city->buildings;
        //$this->selectedBuilding = $this->buildings->first()->pivot->id;

        $this->emit('selectedBuilding', $this->buildings->first()->pivot->id);
    }

    public function render()
    {
        return view('livewire.countries-list');
    }

    /**
     * The countries list will contain:
     * - the current country the player is in
     * - the next destination
     * - random countries (2 for Easy gameplay)
     */
    private function getCountriesList()
    {
        if ($this->investigation === null) {
            $this->investigation = $this->authUser->investigations->first();
        }

        $randomCountries = Country::inRandomOrder()
            ->whereNotIn(
                'cca2',
                [
                    $this->investigation->loc_current,
                    $this->investigation->loc_next,
                ]
            )
            ->limit(self::NB_DESTINATIONS)
            ->get();

        return $randomCountries->merge(
                Country::whereIn('cca2', [
                    $this->investigation->loc_current,
                    $this->investigation->loc_next,
                ])->get()
            )->sort();
    }
}
