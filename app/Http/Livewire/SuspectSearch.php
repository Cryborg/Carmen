<?php

namespace App\Http\Livewire;

use App\Models\Suspect;
use Livewire\Component;

class SuspectSearch extends Component
{
    protected $listeners = ['renderSearch' => 'render'];

    public array $filters = [];

    public function render(string $filter = null)
    {
        if ($filter !== null) {
            $this->filters[] = $filter;
        }

        if (count($this->filters) > 0) {
            $suspects = Suspect::where('hobby', $filter)->get();
        } else {
            $suspects = Suspect::all()->random(10);
        }

        $data = [
            'suspects' => $suspects,
        ];

        return view('livewire.suspect-search', $data);
    }


}
