<?php

namespace PreQuiz\Http\Controllers;

use Illuminate\Http\Request;
use PreQuiz\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search()
    {
    	$uni_name = request('uni_name');
    	$course_id = request('course_id');

    	//dd(request()->all());
    	return view('/search', [
    			'uni_name' => $uni_name,
    			'course_id' => $course_id,
    		]);
    }
}
