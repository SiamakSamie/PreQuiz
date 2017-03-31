<?php

namespace App\Http\Controllers;
use App\Notification;
use Illuminate\Http\Request;
use Auth;

class NotificationsController extends Controller
{
    public function display() {

        $notifs= Notification::where("to_user_id", Auth::user()->id)->orderBy('created_at', 'desc')->get();
        
        return view("notification",[
            "notifs" => $notifs,
            ]);
    }
    
}
