<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\User;
use Blade;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $uni_name = request('uni_name');
    	$course_name = request('course_id'); // this fecthes the course_name actually
        $query_fetch = Quiz::where('university', $uni_name)->where('coursename', $course_name)->get();
        
        // because the previous query fetches many courses, the comments for that course will be associated with the first found quiz related to that course
        $first_fetch = $query_fetch->first();
         
         if($query_fetch->count() == 0)
             return redirect('/')->withErrors(['error']);
        else {       
        	return view('/search', [
        			'uni_name' => $uni_name,
        			'course_name' => $course_name,
        			'db_corr_data' => $query_fetch,
        			'db_corr_first' => $first_fetch,
        		]);
        }
    }
    
    public function getAllUnis() {
         return Quiz::distinct()->pluck('university')->toArray();
     }
     
     public function getAllCourses() {
         $uni_name = request('uni_name');
         return Quiz::distinct()->where('university', $uni_name)->pluck('coursename')->toArray();
      }
      
      public function getAllUsernames() {
          return User::all()->toArray();
      }
}
