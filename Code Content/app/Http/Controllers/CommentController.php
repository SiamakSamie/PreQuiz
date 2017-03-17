<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Quiz;

class CommentController extends Controller
{
    public function addComment() {
        $uni_name = request('uni_name');
        $course_name = request('course_name');
        $user_id = request('user_id');
        $text = request('text');
        
        $comment = new Comment;
        // have to modify text in case of mentions
        //dd($user_mentioned_id);
        
        $user_mentioned_ids = request('mentioned_users_id');
        
      //  foreach($user_mentioned_ids as $id) {
            $text = preg_replace("/@/", "<a href='../profile/". 0 ."'>", $text, 1);
    //    }
        
        // $text = preg_replace("/@/", "<a href='../profile/". 0 ."'>", $text, 1); // the last 1 means max = 1 replacement
        // $text = preg_replace("/@/", "<a href='../profile/". 1 ."'>", $text, 1);
        // $text = preg_replace("/@/", "<a href='../profile/". $user_mentioned_ids ."'>", $text, 1);
        
        
        $final_text = preg_replace('/±/', '</a>', $text);
        
        $comment->comment_content = $final_text;
        
        $course = Quiz::where('coursename', $course_name)->where('university', $uni_name)->get()->first();
        $user = User::where('id', $user_id)->get()->first();
        
        $course->Comments()->save($comment);
        $user->Comments()->save($comment);
        
        return response()->json(['text' => $final_text]);
    }
}
