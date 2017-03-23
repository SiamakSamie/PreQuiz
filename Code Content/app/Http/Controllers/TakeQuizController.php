<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Session;


class TakeQuizController extends Controller
{
    public function index()
    {
       	return view('take_quiz');
    }


    public function store(Request $request)
    {
        
    }

}
