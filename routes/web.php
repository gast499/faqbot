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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();



/* ************* Routes for Botman *********************************
Here is where you can register web routes for your botman application.
*/
Route::get('widget', 'BotManController@widget');
Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker')->name('tinker');


/* ************* Routes for home page *********************************
Here is where you can register web routes for your Initial Page. */


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/month/{month}/year/{year}', 'HomeController@index')->name('home.archive');
Route::get('/user/{user_id}/questions', 'HomeController@index')->name('home.myquestions');

Route::get('/user/{user_id}/profile', 'ProfileController@create')->name('profile.create');
Route::get('/user/{user_id}/profile/{profile_id}', 'ProfileController@show')->name('profile.show');
Route::get('/user/{user_id}/profile/{profile_id}/edit', 'ProfileController@edit')->name('profile.edit');
Route::post('/user/{user_id}/profile/', 'ProfileController@store')->name('profile.store');
Route::patch('/user/{user_id}/profile/{profile_id}', 'ProfileController@update')->name('profile.update');
Route::delete('/user/{user_id}/profile/{profile_id}', 'ProfileController@destroy')->name('profile.destroy');

Route::get('/questions/{question_id}/answers/create', 'AnswerController@create')->name('answers.create');
Route::get('/questions/{question_id}/answers/{answer_id}', 'AnswerController@show')->name('answers.show');
Route::get('/questions/{question_id}/answers/{answer_id}/edit', 'AnswerController@edit')->name('answers.edit');
Route::post('/questions/{question_id}/answers/', 'AnswerController@store')->name('answers.store');
Route::patch('/questions/{question_id}/answer/{answer_id}', 'AnswerController@update')->name('answers.update');
Route::delete('/questions/{question_id}/answer/{answer_id}', 'AnswerController@destroy')->name('answers.destroy');

Route::resources([
    'question' => 'QuestionController',
]);



