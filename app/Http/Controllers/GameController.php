<?php

namespace App\Http\Controllers;

use App\Bases\ControllerBase;
use Illuminate\Support\Facades\Response;
use PragmaRX\Countries\Package\Countries;

class GameController extends ControllerBase
{
    public function index(): \Illuminate\Http\Response
    {
        $countries = new Countries();

        $data = [
            'country' => $countries->first(),
        ];

        return Response::view('game.index', $data);
    }
}
