<?php
//
namespace App\Http\Controllers;

use App\User;
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
     
     return view('profile', [
         'user_info' => $user_info ,
         ]);
         
    }
}
