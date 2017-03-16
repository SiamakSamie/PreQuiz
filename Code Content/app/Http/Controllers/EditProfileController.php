<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class EditProfileController extends Controller
{

public function display(Request $request) {

  /**
     * fetching the user model
     */
    $user = Auth::user();

     return view('editprofile', [
       'user' => $user]);
       
    //return back();
}

public function update(Request $request){
  $id = Auth::user()->id;
    
    $user = User::findOrFail($id);

    $user->name = $request->get('name');

    $user->email = $request->get('email');

    $user->save();
    
   $user_info = User::where('id', $id)->get();
         
         return view('profile', [
             'user_info' => $user_info ,
             ]);
    
}

}