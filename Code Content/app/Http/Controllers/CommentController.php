<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Vote;
use App\User;
use App\Quiz;
use Auth;

class CommentController extends Controller
{
    // this is to be able to fetch comments after AJAX has added a comment
    // this refreshes the data with actually reloading the full page
    // public function getComments(Request $request) {
    //     $course = Quiz::where('coursename', $request->course_name)->where('university', $request->university)->get()->first();
        
    //     return view('comment_list', [
    //         "db_corr_first" => $course,
    //     ]);
    // }
    
    // get recently added comment
    public function rawLastComments(Request $request) {
        
        $last_comment = Quiz::where('coursename', $request->course_name)->where('university', $request->university)->get()->first()->Comments->last();
        $commentator = User::where('id', $last_comment->user_id)->get()->first();
        return [
            "last_comment" => $last_comment,
            "commentator" => $commentator,
        ];
    }
    
    // this is called by AJAX request
    // returns void
    public function addComment(Request $request) {
        
        // fetching request data
        $uni_name = request('uni_name');
        $course_name = request('course_name');
        $user_id = request('user_id');
        $text = trim(nl2br(request('text')));
        
        // making a new comment with requested data
        $comment = new Comment;
        $user_mentioned_ids = request('mentioned_ids');
        
        // if there is a mentioned user
        if(count($user_mentioned_ids) >= 1) {
            // for each mentioned user
            foreach($user_mentioned_ids as $id) {
                    // change his name to a link tag and put it in the db
                $user_mentioned = User::where('id',$id)->pluck('name')->first();
                $user_mentioned = str_replace(" ", "", $user_mentioned);
                
                $text = preg_replace("/@". $user_mentioned."/", "<a href='../profile/". $id ."'> @". $user_mentioned . " </a>", $text, 1);
            }
        }
        
        // save that new content either if there was a mention or not
        $comment->comment_content = $text;
        
        // this part takes cares of relations, we fetch the related quiz and user and assign them that comment
        $course = Quiz::where('coursename', $course_name)->where('university', $uni_name)->get()->first();
        $user = User::where('id', $user_id)->get()->first();
        
        
        $course->Comments()->save($comment);
        $user->Comments()->save($comment);
        
    }
    
    public function upVote(Request $request) {
        // try to fetch vote content
        $vote = Vote::where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->get();
        $comment = Comment::where('id', $request->comm_id)->get()->first();
        $user = Auth::user();
        
        // if previously never voted on this comment
        if($vote->count() == 0) {   
            $new_vote = new Vote;
            $new_vote->up_down = true; // setting the vote to be an up vote
            
            $comment->Vote()->save($new_vote);  // this comment has an up vote now
            $comment->increment('up_votes');    // the comment up votes gets incremented
            
            $user->Vote()->save($new_vote);     // we also need to save in the votes table, who voted 
                                                // because we need to make sure the user can't vote mote than once
        }
        // if already voted on this comment
        else {
            // previously up voted, we got to undo it
            if($vote->first()->up_down == true) {
                
                Vote::findOrFail($vote->first()->id)->delete();
                
                $comment->decrement('up_votes');
                $comment->Vote()->where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->forceDelete();
                
                $user->Vote()->where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->forceDelete();
            }
            // previously down voted, we got to remove it and add an up vote
            else {
                Vote::findOrFail($vote->first()->id)->delete();
                $new_vote = new Vote;
                $new_vote->up_down = true;
                
                $comment->Vote()->where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->forceDelete();
                $comment->Vote()->save($new_vote);  // this comment has an up vote now
                $comment->increment('up_votes'); 
                $comment->decrement('down_votes'); 
                
                $user->Vote()->where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->forceDelete();
                $user->Vote()->save($new_vote);
                
            }
        }
        return ["up" => $comment->up_votes, "down" => $comment->down_votes];
    }
    
    public function downVote(Request $request) {
        // try to fetch vote content
        $vote = Vote::where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->get();
        $comment = Comment::where('id', $request->comm_id)->get()->first();
        $user = Auth::user();
        
        if($vote->count() == 0) {   
            $new_vote = new Vote;
            $new_vote->up_down = false; // setting the vote to be an up vote
            
            $comment->Vote()->save($new_vote);  // this comment has an up vote now
            $comment->increment('down_votes');    // the comment up votes gets incremented
            
            $user->Vote()->save($new_vote);   // we also need to save in the votes table, who voted 
                                              // because we need to make sure the user can't vote mote than once
        }
        else {
            // previously down voted, we got to undo it
            if($vote->first()->up_down == false) {
                
                Vote::findOrFail($vote->first()->id)->delete();
                
                $comment->decrement('down_votes');
                $comment->Vote()->where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->forceDelete();
                
                $user->Vote()->where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->forceDelete();
            }
            else {
                Vote::findOrFail($vote->first()->id)->delete();
                $new_vote = new Vote;
                $new_vote->up_down = false;
                
                $comment->Vote()->where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->forceDelete();
                $comment->Vote()->save($new_vote);  // this comment has an up vote now
                $comment->decrement('up_votes'); 
                $comment->increment('down_votes'); 
                
                $user->Vote()->where('user_id', $request->user_id)->where('comment_id', $request->comm_id)->forceDelete();
                $user->Vote()->save($new_vote);
            }
        }
        return ["up" => $comment->up_votes, "down" => $comment->down_votes];
    }
}
