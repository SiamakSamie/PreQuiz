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
    
         return view('edit_profile', [
           'user' => $user]);
           
        //return back();
    }
    
    public function update(Request $request){
        $id = Auth::user()->id;
        
        // fetching user with id $id
        $user = User::findOrFail($id);
        
        $user->name = $request->get('name');
        $user->university = $request->get('university');
        $user->email = $request->get('email');
    
        $user->save();
        
       $user_info = User::where('id', $id)->get()->first();
    
        return view('profile', [
          'user_info' => $user_info ,
        ]);
    }

}