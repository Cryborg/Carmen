<?php

namespace App\Http\Livewire;

use App\Models\Suspect;
use Faker\Provider\Person;
use Livewire\Component;

class SuspectDetails extends Component
{
    public ?string $genre = null;
    public ?string $hair = null;
    public ?string $height = null;
    public ?string $origin = null;
    public ?string $hobby = null;
    public ?string $sign = null;
    public ?string $fashion_style = null;

    public function render()
    {
        $genres = [
            Person::GENDER_FEMALE,
            Person::GENDER_MALE
        ];

        return view('livewire.suspect-details',
            [
                'genres' => $genres,
                'hairs' => Suspect::HAIR,
                'heights' => Suspect::HEIGHTS,
                'origins' => array_keys(Suspect::ORIGINS_LIST),
                'hobbies' => Suspect::HOBBIES,
                'signs' => Suspect::SIGNS,
                'fashion_styles' => Suspect::FASHION_STYLES,
            ]
        );
    }

    public function updated($value, $name)
    {
        $this->emit('renderSearch', $name);
    }
}
