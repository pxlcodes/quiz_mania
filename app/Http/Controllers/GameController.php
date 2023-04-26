<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Imports\QuestionImport;
use App\Models\Game;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $games = Game::all();
        $games = $games->map(function ($game) {
            return [
                'id' => $game->id,
                'name' => $game->name,
                'total_time' => gmdate('H:i ', $game->total_time),
                'questions' => 50,
                'policies' => [
                    'can_edit' => (bool)rand(0, 1),
                    'can_delete' => (bool)rand(0, 1),
                    'can_play' => (bool)rand(0, 1),
                ],
            ];
        });


        return Inertia::render('Games/Index', [
            'games' => $games
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGameRequest $request
     * @return Response
     */
    public function store(StoreGameRequest $request)
    {
        if ($request->hasFile('file')) {
            Excel::import(new QuestionImport(), $request->file('file'));

        }
//        $game = Game::create($request->validated());

        return redirect()->route('games.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Games/Create');
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Game $game
     * @return Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGameRequest $request
     * @param Game $game
     * @return Response
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
