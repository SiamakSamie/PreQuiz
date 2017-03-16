<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class EditProfileController extends Controller
{

public function update(Request $request) {

  /**
     * fetching the user model
     */
    $user = Auth::user();

     return view('editprofile', [
       'user' => $user]);
       
    //return back();
}

}