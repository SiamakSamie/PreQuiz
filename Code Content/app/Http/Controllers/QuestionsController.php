<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Questions;
use App\Quiz;
use Session;

class QuestionsController extends Controller
{
    // index is called when the Questions are being confirmed in the confirm_quiz page
    public function index()
    {
        // fetch current working quiz 
        // and pass it with the view
        
        // if the previous page sends an ID to view, use it, 
        // otherwise use the id in the session variable
        if(request('quiz_id') != null) 
            Session::put('quiz_id', request('quiz_id'));
            
            
        $quiz = Quiz::where('id', Session::get('quiz_id'))->get()->first();
        $questions = $quiz->Questions;
        
        return view('confirm_quiz', [
            "quiz" => $quiz,
            "questions" => $questions,
        ]);
    }
    // this function is called when creating a new question for a quiz 
    // this also handles an array of questions at a time
    public function store(Request $request)
    {
        // for each question
        for ($i = 0; $i < count($request->question); $i++)
        {
           // validate it 
           $this->validate($request, array(
                    'question.'.$i.''=> 'required',
                    'answer1.'.$i.'' => 'required',
                    'answer2.'.$i.'' => 'required',
                    'answer3.'.$i.'' => 'required',
                    'answer4.'.$i.'' => 'required'
                ));

            // and store it in the db
            $questions = new Questions;
            $questions ->question=$request->question[$i];
            $questions->answer1=$request->answer1[$i];
            $questions->answer2=$request->answer2[$i];
            $questions->answer3=$request->answer3[$i];
            $questions ->answer4=$request->answer4[$i];
            
            $questions->save();
            
            // this takes care of relations, every quiz has questions
            $thisQuiz = Quiz::where('id', Session::get('quiz_id'))->get()->first();
            $thisQuiz->Questions()->save($questions);
            
    }


        return redirect()->route('questions.index');
    }
    
    // this is called when a user is creating questions
    public function show($id) {  
      
     $quiz = Quiz::where('id', Session::get('quiz_id'))->get()->first();
        
		 return view('questions', [
		      "quiz" => $quiz,
		      "quiz_id" , $id,
	     ]);
    }
}
