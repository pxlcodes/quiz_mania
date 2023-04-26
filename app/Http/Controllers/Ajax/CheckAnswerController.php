<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckAnswerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $answer = $request->answer;
        $question = $request->question;
        $correct_answer = $request->correct_answer;
        $correct_answer = strtolower($correct_answer);
        $answer = strtolower($answer);
        if ($answer == $correct_answer) {
            return response()->json(['status' => 'success', 'message' => 'Correct Answer']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Wrong Answer']);
        }
    }
}
