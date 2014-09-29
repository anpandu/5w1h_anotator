<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return View::make('pages.home');
});

Route::get('about', function() {
	return View::make('pages.about');
});

Route::get('contact', function() {
	return View::make('pages.contact');
});


Route::resource('user', 'UsersController');

Route::get('article/list', array('uses' => 'ArticlesController@lists'));
Route::get('article/{article_id}/user/{user_id}', array('uses' => 'ArticlesController@info'));
Route::resource('article', 'ArticlesController');

Route::get('info/create/{id}', array('uses' => 'InfoController@create'));
Route::get('info/edit/{id}', array('uses' => 'InfoController@edit'));
Route::post('info/edit/{id}', array('uses' => 'InfoController@update'));
Route::resource('info', 'InfoController');


Route::get('login', array('uses' => 'LoginController@showLogin'));
Route::post('login', array('uses' => 'LoginController@doLogin'));
Route::get('logout', array('uses' => 'LoginController@doLogout'));