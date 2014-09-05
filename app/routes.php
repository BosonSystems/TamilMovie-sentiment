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

Route::get('/', function()
{
	return View::make('hello');
});
*/
Route::get('/', 'MovieController@index');
Route::get('new', 'MovieController@create');
Route::post('new', 'MovieController@store');
Route::get('/view/{id}', 'MovieController@show');
Route::get('/edit/{id}', 'MovieController@edit');
Route::post('/edit/{id}', 'MovieController@update');
Route::get('/word/{id}', 'MovieController@wordAnalysis');
Route::get('/market/{isin}', 'MovieController@stock');