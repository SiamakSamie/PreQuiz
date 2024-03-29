<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Questions;
use Redirect;
use Auth;
use Illuminate\Http\Request;

class EditQuizController extends Controller
{
    // fetch quizzes made by Authenticated user and pass it with the view
    public function display_editables() {
        
        $all_my_quizzes = Quiz::all()->sortByDesc('updated_at')->where('user_id', Auth::user()->id);
        
        return view('editable_quizzes', [
            "all_my_quizzes" => $all_my_quizzes
        ]);
    }
    

    // this is used by AngularJS to fetch all questions by a specific ID
    public function getQuestions(Request $request) {
        return Questions::where('quiz_id', $request->id)->get();
    }
    

    // fetch the quiz where id is the given id and give it with the view
    public function edit_quiz(Request $request) {
        
        $my_quiz = Quiz::all()->where('id', $request->quiz_id)->first();
        
        return view("editing_quiz", [
            "my_quiz" => $my_quiz,
            ]);
    }
    // this is called when an edit quiz request is sent
    public function update(Request $request) {
        
        $this_quiz = Quiz::findOrFail($request->quiz_id);
        
        // verify quiz info
        
        $this->validate($request, array(
            'quizname' => 'required',
            'university' => 'required',
            'coursename' => 'required',
            'quizdescription' => 'required',
        ));
               
       // replace old content with new content for quiz info
        $this_quiz->quizname = $request->quizname;
        $this_quiz->university = $request->university;
        $this_quiz->coursename = $request->coursename;
        $this_quiz->quizdescription = $request->quizdescription;
        $this_quiz->resources = $request->quizresources;
        
        $this_quiz->save();
        

        Questions::where('quiz_id', $this_quiz->id)->delete();
    
        for ($i = 0; $i < count($request->question); $i++)
        {
          $this->validate($request, array(
                    'question.'.$i.''=> 'required',
                    'answer1.'.$i.'' => 'required',
                    'answer2.'.$i.'' => 'required',
                    'answer3.'.$i.'' => 'required',
                    'answer4.'.$i.'' => 'required'
                ));
            
            $question = new Questions;
            $question->question=$request->question[$i];
            $question->answer1=$request->answer1[$i];
            $question->answer2=$request->answer2[$i];
            $question->answer3=$request->answer3[$i];
            $question->answer4=$request->answer4[$i];
            $question->save();
            
            $this_quiz->Questions()->save($question);
        }
        return Redirect('edit_quiz')->with('status', 'Quiz updated!');
    }
}
