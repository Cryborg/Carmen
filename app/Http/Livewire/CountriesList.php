<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Collection;
use Livewire\Component;

class CountriesList extends Component
{
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
        $countries = Country::all();

        $this->countries = $countries;

        if ($this->selectedCountry === null) {
            $this->selectedCountry = $countries->first()->id;

            $this->updatedSelectedCountry($this->selectedCountry);
        }

        if ($this->selectedCity === null) {
            $this->selectedCity = $this->cities->first()->id;
        }

        $this->updatedSelectedCity($this->selectedCity);
    }

    public function render()
    {
        return view('livewire.countries-list');
    }

    public function updatedSelectedCountry(int $country)
    {
        if (!is_null($country)) {
            $this->cities = Country::find($country)->cities;

            $this->selectedCity = $this->cities->first()->id;
        }
    }

    public function updatedSelectedCity($city)
    {
        if (!is_null($city)) {
            $this->buildings = City::find($city)->buildings;
        }
    }
}
