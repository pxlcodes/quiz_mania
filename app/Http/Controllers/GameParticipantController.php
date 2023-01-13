<?php

namespace App\Http\Controllers;

use App\Models\GameParticipant;
use App\Http\Requests\StoreGameParticipantRequest;
use App\Http\Requests\UpdateGameParticipantRequest;

class GameParticipantController extends Controller
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
     * @param  \App\Http\Requests\StoreGameParticipantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameParticipantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameParticipant  $gameParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(GameParticipant $gameParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameParticipant  $gameParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(GameParticipant $gameParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameParticipantRequest  $request
     * @param  \App\Models\GameParticipant  $gameParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameParticipantRequest $request, GameParticipant $gameParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameParticipant  $gameParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameParticipant $gameParticipant)
    {
        //
    }
}
