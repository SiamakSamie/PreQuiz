<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $uni_name = request('uni_name');
    	$course_id = request('course_id');
        $query_fetch = DB::table('courses')->where('university_name', $uni_name)->where('course_name', $course_id)->get();
        
    	//dd(request()->all());
    	return view('/search', [
    			'uni_name' => $uni_name,
    			'course_id' => $course_id,
    			'db_corr_data' => $query_fetch,
    		]);
    		
    	
    }
}
