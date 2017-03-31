<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Quiz;
use Auth;
use App\User;
use Session;


class QuizController extends Controller
{
    public function index()
    {
       	return view('create_quiz');
    }


    public function store(Request $request)
    {
        // validate the entries
        $this->validate($request, array(
            
                'quizname'=> 'required|max:255',
                'university' => 'required',
                'coursename'=> 'required',
               'quizdescription' => 'required',
            ));
            
        // this is used later to make the relations
        $user_id = Auth::user()->id;
        
        // save the entries
        $quiz = new Quiz;
        $quiz ->quizname=$request->quizname;
        $quiz->university=$request->university;
        $quiz->coursename=$request->coursename;
        $quiz->resources=$request->resources;
        $quiz->quizdescription=$request->quizdescription;

        $quiz ->username=auth()->user()->name;
        
        $user= User::where('id', $user_id)->get()->first();
        $user->Quizzes()->save($quiz);
        
        $quiz->save();
        
        Session::put('quiz_id', $quiz->id);
        
        return redirect()->route('questions.show', $quiz->id)->with('status', 'Quiz created, please add some questions!');
    }

}
