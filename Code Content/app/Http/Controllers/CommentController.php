<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Quiz;

class CommentController extends Controller
{
    public function addComment(Request $request) {
        
        $uni_name = request('uni_name');
        $course_name = request('course_name');
        $user_id = request('user_id');
        $text = trim(nl2br(request('text')));
        
        $comment = new Comment;
        $user_mentioned_ids = request('mentioned_ids');
        
        if(count($user_mentioned_ids) >= 1) {
            foreach($user_mentioned_ids as $id) {
                
                $user_mentioned = User::where('id',$id)->pluck('name')->first();
                $user_mentioned = str_replace(" ", "", $user_mentioned);
                
                $text = preg_replace("/@". $user_mentioned."/", "<a href='../profile/". $id ."'> @". $user_mentioned . " </a>", $text, 1);
            }
        }
        
        $comment->comment_content = $text;
        
        $course = Quiz::where('coursename', $course_name)->where('university', $uni_name)->get()->first();
        $user = User::where('id', $user_id)->get()->first();
        
        $course->Comments()->save($comment);
        $user->Comments()->save($comment);
        
        return response()->json(['text' => $text]);
    }
}
