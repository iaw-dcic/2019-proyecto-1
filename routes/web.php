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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/lists', 'ListController@index');

Route::get('/create', 'ListController@create');

Route::post('/lists', 'ListController@store');

Route::get('/lists/{list}', 'ListController@show');

Route::get('/lists/{list}/edit', 'ListController@edit');

Route::patch('/lists/{list}', 'ListController@update');

Route::delete('/lists/{list}', 'ListController@destroy');

Route::get('/songs/{song}', 'SongController@show');

Route::get('/lists/{list}/create', 'SongController@create');

Route::post('/songs/{list}', 'SongController@store');

Route::delete('/songs/{song}', 'SongController@destroy');

Route::get('/songs/{song}/edit', 'SongController@edit');

Route::patch('/songs/{song}', 'SongController@update');