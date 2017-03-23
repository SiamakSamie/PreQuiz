<?php
//
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    function displayAll($id) {
        
     if ($id == 0)
        $user_id = Auth::user()->id;
    else {
        
        $user_id = User::where('id', $id);
        
        if ($user_id->count() == 0)
            $user_id = "Not a user";
        else
            $user_id = $user_id->get()->first()->id;
     }
     
     $user_info = User::where('id', $user_id)->get();
     
     return view('profile', [
         'user_info' => $user_info ,
         ]);
         
    }
}
