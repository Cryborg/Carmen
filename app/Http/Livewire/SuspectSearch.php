<?php

namespace App\Http\Livewire;

use App\Models\Suspect;
use Livewire\Component;

class SuspectSearch extends Component
{
    protected $listeners = ['renderSearch' => 'addFilter'];

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
        $filters = session('filters');

        if ($filters && count($filters) > 0) {
            if ($filter[1] === '') {
                unset($filters[$filter[0]]);
            } else {
                $filters[$filter[0]] = $filter[1];
            }

            session(['filters' => $filters]);
        } else {
            session(['filters' => [$filter[0] => $filter[1]]]);
        }
    }
}
