<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TeamScoreController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $team = $request->user()->team;
        return response()->json([
            'score' => $team->score
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_id' => ['required', 'exists:teams,id'],
            'question_id' => ['required', 'exists:questions,id'],
            'game_id' => ['required', 'exists:games,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'is_correct' => ['required', 'boolean'],
        ]);

//        $team = $request->user()->team;
//        $team->score += $request->is_correct ? 1 : 0;
//        $team->save();

    }


}
