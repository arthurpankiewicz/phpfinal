<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//HomeController
Route::get('/', 'HomeController@home');

//RateController
Route::get('rate', 'RateController@rate');

//SchoolsController
Route::get('schools', 'SchoolsController@schools');

Route::get('school/{id}', 'SchoolsController@school');

//CoursesController
Route::get('courses', 'CoursesController@courses');

Route::get('course/{id}', 'CoursesController@course');

Route::get('reviewcourse/{id}', 'CoursesController@reviewCourse');
Route::post('reviewcourse/{id}', 'CoursesController@reviewedCourse');

Route::get('addcourse', 'CoursesController@addCourse');

//Facebook Login
Route::get('/facebook', 'FacebookController@facebook');
Route::get('/callback', 'FacebookController@callback');
