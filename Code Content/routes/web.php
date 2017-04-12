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
Route::post('/putScore','TakeQuizController@store');

Route::post('/getAllUnis', 'SearchController@getAllUnis');

Route::post('/getAllCourses', 'SearchController@getAllCourses');

Route::post('/getAllUserNames', 'SearchController@getAllUsernames');


Route::post('/getQuestions', 'EditQuizController@getQuestions');

Route::get('/', function () {
    
    return view('home');
});

Route::post('/search', 'SearchController@search');

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::post('/comment_list', 'CommentController@getComments');
Route::post('/lastComment', 'CommentController@rawLastComments');

// all the routes in this section are restriced to logged in users only
Route::group( ['middleware' => 'auth' ], function()
{
    Route::resource('create_quiz','QuizController');
    Route::resource('questions','QuestionsController');
    Route::post('/EditProfile', 'EditProfileController@update');
    Route::post('/addComment', 'CommentController@addComment');
    Route::post('/upVoteComment', 'CommentController@upVote');
    Route::post('/downVoteComment', 'CommentController@downVote');
    Route::get('/profile/{id}', 'ProfileController@displayAll');
    Route::get('/edit_quiz', 'EditQuizController@display_editables');
    Route::post('/editing_quiz', 'EditQuizController@edit_quiz');
});

Route::resource('/take_quiz', 'TakeQuizController');


Route::get('/contact_us', 'ContactUsController@contact_us');

Route::get('/about_us', function(){return view('about_us');});

Route::post('/edit_profile', 'EditProfileController@display');

Route::post('/updateProfileInfo', "EditProfileController@update");

Route::patch('/updateQuizInfo', 'EditQuizController@update');


Route::post('/sendContactUsMail', function() {
   $data = request("message");
   $name = request("name");
   $email = request("email");
   
   Mail::send('email_message', array('name'=>$name, 'data'=>$data, 'email'=>$email), function($message) {        
     $message->to("ryan3nichols@gmail.com", "contact us")->subject("Contact Us email from PreQuiz"); 
     
   });

   return [$data,$name,$email];

 });  

Route::get('/notifications', 'NotificationsController@display');
