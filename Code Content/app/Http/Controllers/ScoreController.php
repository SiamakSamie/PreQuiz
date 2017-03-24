<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Score;


class ScoreController extends Controller
{
    public function store(Request $request)
    {

        $score = new Score;
        $score ->id=$request->score;
        $score ->score=$request->score;
        $score ->score=$request->score;

        $score->save();

    }
}
