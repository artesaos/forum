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

Route::group(['prefix' => 'auth'],
    function () {
        Route::get('/', ['as' => 'auth.index', 'uses' => 'AuthController@index']);
        Route::post('/', ['as' => 'auth.store', 'uses' => 'AuthController@store']);
        
        Route::get('/facebook', ['as' => 'auth.store.facebook', 'uses' => 'AuthController@getFacebook']);
        Route::get('/github', ['as' => 'auth.store.github', 'uses' => 'AuthController@getGithub']);
        Route::get('/twitter', ['as' => 'auth.store.twitter', 'uses' => 'AuthController@getTwitter']);
        Route::get('/google', ['as' => 'auth.store.google', 'uses' => 'AuthController@getGoogle']);

        Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
        Route::get('/register', ['as' => 'auth.register', 'uses' => 'AuthController@register']);
        Route::post('/register', ['as' => 'auth.register.store', 'uses' => 'AuthController@registerUser']);
    });

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('/questions', ['as' => 'questions.index', 'uses' => 'QuestionsController@index']);
Route::get('/questions/{id}', ['as' => 'questions.show', 'uses' => 'QuestionsController@show']);
