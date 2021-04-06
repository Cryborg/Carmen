<?php

namespace App\Http\Controllers;

use App\Models\Suspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SuspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suspect  $suspect
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Suspect $suspect)
    {
        return Response::json(
            [
                'suspect' => $suspect,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function edit(Suspect $suspect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suspect $suspect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suspect $suspect)
    {
        //
    }
}
