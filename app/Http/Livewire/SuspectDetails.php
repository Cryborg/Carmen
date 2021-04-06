<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Models\Suspect;
use Faker\Provider\Person;
use Illuminate\Support\Facades\Auth;

class SuspectDetails extends ComponentBase
{
    public ?string $genre = null;
    public ?string $hair = null;
    public ?string $height = null;
    public ?string $origin = null;
    public ?string $hobby = null;
    public ?string $sign = null;
    public ?string $fashion_style = null;

    public function mount()
    {
        parent::mount();

        $filters = session('filters') ?? [];

        // If there is nothing in the session, check if there is something
        // in the database, from a previous game session.
        if (empty($filters)) {
            $investigation = $this->authUser->investigation;

            if ($investigation) {
                $filters = array_filter([
                    'genre' => $investigation->genre,
                    'hair' => $investigation->hair,
                    'height' => $investigation->height,
                    'origin' => $investigation->origin,
                    'hobby' => $investigation->hobby,
                    'sign' => $investigation->sign,
                    'fashion_style' => $investigation->fashion_style,
                ]);
                session(['filters' => $filters]);
            }
        }

        $this->genre = $filters['genre'] ?? null;
        $this->hair = $filters['hair'] ?? null;
        $this->height = $filters['height'] ?? null;
        $this->origin = $filters['origin'] ?? null;
        $this->hobby  = $filters['hobby'] ?? null;
        $this->sign = $filters['sign'] ?? null;
        $this->fashion_style = $filters['fashion_style'] ?? null;
    }

    public function render()
    {
        $genres = [
            Person::GENDER_FEMALE,
            Person::GENDER_MALE
        ];



        return view('livewire.suspect-details',
            [
                // Populate select boxes
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

    public function updated($key, $value)
    {
        $this->emit('renderSearch', [$key, $value]);
    }
}
