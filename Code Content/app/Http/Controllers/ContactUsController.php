<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contact_us()
    {
        return view('contact_us');
    }
    
    public function sednContactUsMail() {
       $data = request("message");
       $name = request("name");
       $email = request("email");
       
       Mail::send('email_message', array('name'=>$name, 'data'=>$data, 'email'=>$email), function($message) {        
         $message->to("ryan3nichols@gmail.com", "contact us")->subject("Contact Us email from PreQuiz"); 
         
       });
    
       return Redirect('/contact_us')->with('status', 'We will get back at you eventually');

    }
}
