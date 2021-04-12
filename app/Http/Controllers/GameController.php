<?php

namespace App\Http\Controllers;

use App\Bases\ControllerBase;
use Illuminate\Support\Facades\Response;

class GameController extends ControllerBase
{
    public function index(): \Illuminate\Http\Response
    {
        if ($this->authUser->investigations()->count() === 0) {
            redirect('/');
        }

        return Response::view('game.index');
    }
}
