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

// Route::get('/', function () {
//     return view('');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
 
// Questionairs routes
Route::get('questionairs','QuestionairController@index')->name('questionairs');
Route::get('questionairs/create','QuestionairController@create')->name('questionairs.create');
Route::post('questionairs/store','QuestionairController@store')->name('questionairs.store');


// Questions routes
Route::get('question/create/{questionair_id}','QuestionController@create')->name('questions.create');
Route::post('question/store','QuestionController@store')->name('questions.store');

