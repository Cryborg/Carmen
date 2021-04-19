<?php

namespace App\Http\Livewire;

use App\Models\Country;
use Illuminate\Support\Collection;
use Livewire\Component;

class ManageCountries extends Component
{
    protected $listeners = [
        '$refresh',
    ];

    public Collection $countries;
    public Collection $cities;

    public $country = null;

    public $selectedCountry = null;
    public $selectedCity = null;

    public $rules = [
        'selectedCountry' => 'exists:countries',
        'selectedCity'    => 'exists:cities',
    ];

    public function mount()
    {
        $this->countries = Country::all()->sort();
    }

    public function updatedSelectedCountry(int $country)
    {
        $this->country = Country::find($country);
        $this->selectedCountry = $this->country->id;
        $this->cities = $this->country->cities;

        $this->emitTo('upload-picture', 'refreshComponent', 'countries', $this->selectedCountry);
        $this->emitTo('upload-picture', 'refreshComponent', 'cities', $this->cities->first()->id);
    }
}
