<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Models\Country;
use App\Models\Specialty;
use Illuminate\Support\Collection;

class CreateClue extends ComponentBase
{
    public Collection $countries;

    public ?string $country = null;
    public ?string $name = null;
    public ?string $wikipedia_link = null;
    public array $clues = [];
    public int $nbClues = 1;

    protected array $rules = [
        'country' => 'required|exists:countries,cca2',
        'name' => 'required|min:5',
        'wikipedia_link' => 'min:5|max:60',
        'clues' => 'array|min:1',
    ];

    public function mount()
    {
        $this->countries = Country::all()->sort();
        $this->country = $this->countries->first()->cca2;

        $this->addClue();
    }

    public function addClue()
    {
        $this->nbClues++;
        $this->clues[] = '';
    }

    public function removeClue($i)
    {
        unset($this->clues[$i]);
    }

    public function createClueSubmit()
    {
        $this->validate();

        Specialty::create([
            'country' => $this->country,
            'name' => $this->name,
            'wikipedia_link' => $this->wikipedia_link,
            'clues' => array_values($this->clues),
            'user_id' => $this->authUser->id,
        ]);
    }

    public function render()
    {
        return view('livewire.create-clue');
    }
}
