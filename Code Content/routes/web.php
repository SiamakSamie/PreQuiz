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

Route::post('/getAllUnis', 'SearchController@getAllUnis');

Route::post('/getAllCourses', 'SearchController@getAllCourses');

Route::get('/', function () {
    
    return view('home');
});

Route::post('/search', 'SearchController@search');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'ProfileController@displayAll');

Route::resource('create_quiz','QuizController');
Route::resource('questions','QuestionsController');

Route::get('/take_quiz', 'TakeQuizController@take_quiz');

Route::get('/contactus', 'ContactUsController@contactus');

Route::get('/aboutus', function(){
    return view('aboutus');
});

Route::post('/EditProfile', 'EditProfileController@update');

Route::post('/addComment', 'CommentController@addComment');

Route::post('/sendContactUsMail', function() {
   $data = request("message");
   $name = request("name");
   $email = request("email");
   
   \Mail::send('email_message', array('name'=>$name), function($message) {
       $message->to("ryan3nichols@gmail.com", "contact us")->subject("subject");
 
   });

   return [$data,$name,$email];
});
