<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Questions;
use Session;

class QuestionsController extends Controller
{
  
    public function index()
    {
        return view('questions');
    }

    public function store(Request $request)
    {

        for ($i = 0; $i < count($request->question); $i++)
        {
           $this->validate($request, array(
                    'question.'.$i.''=> 'required',
                    'answer1.'.$i.'' => 'required',
                    'answer2.'.$i.'' => 'required',
                    'answer3.'.$i.'' => 'required',
                    'answer4.'.$i.'' => 'required'
                ));
                
            $questions = new Questions;
            $questions ->quiz_id=Session::get('quiz_id');
            $questions ->question=$request->question[$i];
            $questions->answer1=$request->answer1[$i];
            $questions->answer2=$request->answer2[$i];
            $questions->answer3=$request->answer3[$i];
            $questions ->answer4=$request->answer4[$i];
            
            $questions->save();
    }

        return redirect()->route('questions.show','testing');
    }

    public function show($id)
    {
    		 return view('questions')->with('quiz_id', $id);
    }
}
