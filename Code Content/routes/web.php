<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/getAllUnis', function() {
    return DB::table('courses')->distinct()->pluck('university_name')->toArray();
});

Route::post('/getAllCourses', function() {
    $uni_name = request('uni_name');
    return DB::table('courses')->distinct()->where('university_name', $uni_name)->pluck('course_name')->toArray();
});

Route::get('/', function () {
    return view('home');
});

Route::post('/search', 'SearchController@search');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'ProfileController@displayAll');

Route::get('/aboutus', function(){
    return view('aboutus');
});
