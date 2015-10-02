<?php
/*
|--------------------------------------------------------------------------
| Front Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/auth', ['as' => 'auth.index', 'uses' => 'AuthController@index']);
Route::post('/auth', ['as' => 'auth.store', 'uses' => 'AuthController@store']);
Route::get('/auth/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('/register', ['as' => 'register', 'uses' => 'RegisterController@register']);
Route::post('/register', ['as' => 'register.save', 'uses' => 'RegisterController@registerUser']);
Route::get('/questions', ['as' => 'questions.index', 'uses' => 'QuestionsController@index']);
Route::get('/questions/{id}', ['as' => 'questions.show', 'uses' => 'QuestionsController@show']);
