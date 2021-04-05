<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use PragmaRX\Countries\Package\Countries;

class GameController extends Controller
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
