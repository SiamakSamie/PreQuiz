<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TakeQuizController extends Controller
{
    public function take_quiz()
    {
        return view('take_quiz');
    }
}
