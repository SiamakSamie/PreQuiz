<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Session;
use App\Quiz;


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
        
    }

}
