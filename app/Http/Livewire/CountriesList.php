<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Collection;
use Livewire\Component;

class CountriesList extends Component
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
    }

    public function render()
    {
        return view('livewire.countries-list');
    }

    public function updatedSelectedCountry(int $country)
    {
        $this->cities = Country::find($country)->cities;
        $this->selectedCity = null;
    }

    public function selectedCity(City $city)
    {

        if (!is_null($city)) {
            $this->buildings = $city->buildings;
            $this->selectedCity = $city->id;
        }
    }
}
