<?php
//
namespace App\Http\Controllers;

use App\User;
use App\Score;
use App\Quiz;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    function displayAll($id) {
    // if the user ID given is 0, then display current profile
        if ($id == 0)
            $user_id = Auth::user()->id;
        else {
            
        // else display the given user ID's profile and handle exceptions
        
            $user_id = User::where('id', $id);
            
            if ($user_id->count() == 0)
                $user_id = "Not a user";
            else
                $user_id = $user_id->get()->first()->id;
         }
         
         // once that's done, pass the result to a variable
         // and then pass it with the view
         
         $user_info = User::where('id', $user_id)->get()->first();
         $score_info = Score::where('user_id', $user_id)->get();
    
            
        $data = array();
         
        foreach ($score_info as $sc)
        {
            $quiz_info = Quiz::where('id', $sc->quiz_id)->first();
            
            $data['course_name'][] = $quiz_info->coursename;
            $data['quiz_name'][] = $quiz_info->quizname;
            $data['date'][] = $sc->created_at;
            $data['score'][] = $sc->score;
            $data['resources'][] = $quiz_info->resources;
            $data['url'][] = $quiz_info->id;
        }
        return view('profile', [
             'user_info' => $user_info ,
             'all_score_data'=> $data
        ]);
         
    }
}

