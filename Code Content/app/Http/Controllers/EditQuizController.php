<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Questions;
use Redirect;
use Auth;
use Illuminate\Http\Request;

class EditQuizController extends Controller
{
    public function display_editables() {
        
        $all_my_quizzes = Quiz::all()->where('user_id', Auth::user()->id);
        return view('editable_quizzes', [
            "all_my_quizzes" => $all_my_quizzes
        ]);
    }
    
    public function getQuestions(Request $request) {
        return Questions::where('quiz_id', $request->id)->get();
    }
    
    public function edit_quiz(Request $request) {
        
        $my_quiz = Quiz::all()->where('id', $request->quiz_id)->first();
        
        return view("editing_quiz", [
            "my_quiz" => $my_quiz,
            ]);
    }
    
    public function update(Request $request) {
        
        $this_quiz = Quiz::where('id', $request->quiz_id)->get()->first();
        
        // quiz info
        
        $this->validate($request, array(
            'quizname' => 'required',
            'university' => 'required',
            'coursename' => 'required',
            'quizdescription' => 'required',
        ));
               
               
        $this_quiz->quizname = $request->quizname;
        $this_quiz->university = $request->university;
        $this_quiz->coursename = $request->coursename;
        $this_quiz->quizdescription = $request->quizdescription;
        
        $this_quiz->save();
        
        // question info
        foreach($this_quiz->Questions as $i => $question) {
            
            $this->validate($request, array(
                'question.'.$i.''=> 'required',
                'answer1.'.$i.'' => 'required',
                'answer2.'.$i.'' => 'required',
                'answer3.'.$i.'' => 'required',
                'answer4.'.$i.'' => 'required'
            ));
                
            $this_quiz->Questions[$i]->question = $request->question[$i];
            $this_quiz->Questions[$i]->answer1 = $request->answer1[$i];
            $this_quiz->Questions[$i]->answer2 = $request->answer2[$i];
            $this_quiz->Questions[$i]->answer3 = $request->answer3[$i];
            $this_quiz->Questions[$i]->answer4 = $request->answer4[$i];
            
            $this_quiz->Questions[$i]->save();
        }
           
        return Redirect('edit_quiz')->with('status', 'Quiz updated!');
    }
}
