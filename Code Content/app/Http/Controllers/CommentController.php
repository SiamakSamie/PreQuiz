<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Course;

class CommentController extends Controller
{
    public function addComment() {
        $uni_name = request('uni_name');
        $course_name = request('course_name');
        $user_id = request('user_id');
        $text = request('text');
        
        $comment = new Comment;
        $comment->comment_content = $text;
        
        
        $course = Course::where('course_name', $course_name)->where('university_name', $uni_name)->get()->first();
        $user = User::where('id', $user_id)->get()->first();
        
        $course->Comments()->save($comment);
        $user->Comments()->save($comment);
        
        return response()->json(['text' => $text]);
    }
}
