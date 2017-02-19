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

Route::get('/', function () {
    
    $universities = DB::table('courses')->pluck('university_name')->toArray();

    return view('home', [
         'unis' => $universities,   
        ]);
});

Route::post('/search', 'SearchController@search');

Auth::routes();

Route::get('/home', 'HomeController@index');
