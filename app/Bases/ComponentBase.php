<?php

namespace App\Bases;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ComponentBase extends Component
{
    protected ?User $authUser;

    public function __construct()
    {
        parent::__construct();

        $this->authUser = Auth::user();
    }
}
