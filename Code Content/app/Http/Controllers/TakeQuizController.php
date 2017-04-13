<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Quiz;
use App\Score;


class TakeQuizController extends Controller
{
    public function index()
    {

    }
    
    public function show($id)
    {
        $quiz_id = Quiz::where('id', $id)->get()->first();
        
        return view('take_quiz', [
            "quiz" => $quiz_id,
        ]);
        
    }


    public function store(Request $request)
    {
        // this is used later to make the relations
        $user_id = Auth::user()->id;
        
        // save the entries
        
        $score = new Score;
        $score ->user_id=$user_id;
        $score ->quiz_id=$request->quiz_id;
        $score ->score=$request->score;
        $score->save();
    }

}
