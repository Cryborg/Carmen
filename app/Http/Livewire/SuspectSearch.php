<?php

namespace App\Http\Livewire;

use App\Bases\ComponentBase;
use App\Models\Suspect;

class SuspectSearch extends ComponentBase
{
    protected $listeners = ['renderSearch' => 'addFilter'];

    public bool $caseClosed = false;

    public function render()
    {
        $suspects = [];
        $filters = session('filters');

        if ($filters && count($filters) > 0) {
            $suspects = Suspect::where($filters)->get();
        }

        $data = [
            'suspects' => $suspects,
        ];

        return view('livewire.suspect-search', $data);
    }

    public function addFilter(array $filter)
    {
        $investigation = $this->authUser->investigations->first();

        $filters = session('filters');

        if ($filters && count($filters) > 0) {
            if ($filter[1] === '') {
                unset($filters[$filter[0]]);
                $newValue = null;
            } else {
                $filters[$filter[0]] = $filter[1];
                $newValue = $filter[1];
            }

            $investigation->{$filter[0]} = $newValue;
            $investigation->save();
            session(['filters' => $filters]);
        } else {
            session(['filters' => [$filter[0] => $filter[1]]]);
        }
    }

    public function checkWarrant(Suspect $suspect)
    {
        $investigation = $this->authUser->investigations->first();

        $this->caseClosed = $suspect->id === $investigation->suspect->id;

        if ($this->caseClosed) {
            $investigation->delete();
        }
    }
}
