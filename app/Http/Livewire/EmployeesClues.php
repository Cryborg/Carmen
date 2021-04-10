<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeesClues extends Component
{
    protected $listeners = ['selectedBuilding'];

    public $buildingEmployees;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.employees-clues');
    }

    public function selectedBuilding($cityBuilding)
    {
        $this->buildingEmployees = Employee::where('building_city_id', $cityBuilding)->get();
    }
}
