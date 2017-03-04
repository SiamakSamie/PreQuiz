<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $uni_name = request('uni_name');
    	$course_id = request('course_id');
        $query_fetch = Course::where('university_name', $uni_name)->where('course_name', $course_id)->get();
        
        // because the previous query fetches many courses, the comments for that course will be associated with the first found quiz related to that course
         $first_fetch = $query_fetch->first();
         
         if($query_fetch->count() == 0)
             return redirect('/')->withErrors(['error']);
        else {       
    	//dd(request()->all());
    	return view('/search', [
    			'uni_name' => $uni_name,
    			'course_id' => $course_id,
    			'db_corr_data' => $query_fetch,
    			'db_corr_first' => $first_fetch,
    		]);
        }
    }
    
    public function getAllUnis() {
         return Course::distinct()->pluck('university_name')->toArray();
     }
     
     public function getAllCourses() {
         $uni_name = request('uni_name');
         return Course::distinct()->where('university_name', $uni_name)->pluck('course_name')->toArray();
      }
}
