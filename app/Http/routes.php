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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/movie/like/{id}', 'MoviesController@like');
    Route::resource('movie', 'MoviesController');
    Route::resource('review', 'ReviewsController');
    Route::post('rating', 'RatingsController@store');
    Route::post('like', 'LikesController@like');
    Route::post('dislike', 'LikesController@dislike');
});

//Route::get('movies/create', 'MoviesController@create');
//
//Route::post('movies', 'MoviesController@store');
//
//Route::get('movies/{id}', 'MoviesController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
