<?php


namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    function displayAll() {
    $email = Auth::user()->email;
    
    $user_info = DB::table('users')->get()->where('email', $email)->toArray();
        
        return view('profile', [
            'user_info' => $user_info ,
            ]);
        
        //return view('profile');
    }
}
