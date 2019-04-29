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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/readme', function() {
	return view('readme');
});

Route::get('/lists', 'MovieListController@index');
Route::post('/lists', 'MovieListController@store');
Route::get('/lists/create', 'MovieListController@create');
Route::get('/lists/{list}', 'MovieListController@show');
Route::get('/lists/{list}/edit', 'MovieListController@edit');
Route::patch('/lists/{list}', 'MovieListController@update');
Route::delete('lists/{list}', 'MovieListController@delete');

Route::get('/lists/{list}/createmovie', 'MovieController@create');
Route::post('lists/{list}', 'MovieController@store');
Route::get('lists/{list}/movies/{movie}/editmovie', 'MovieController@edit');
Route::patch('/lists/{list}/movies/{movie}', 'MovieController@update');
Route::delete('/lists/{list}/movies/{movie}', 'MovieController@delete');

Route::get('/search', 'SearchController@index');
Route::post('/search', 'SearchController@show');
Route::get('/searchresults/{user}', 'SearchController@showUser');
Route::get('/searchresults/{user}/list/{list}', 'SearchController@showList');
Route::get('/searchresults/{user}/list/{list}/movie/{movie}', 'SearchController@showMovie');

Route::get('/editprofile', 'UserController@edit');
Route::patch('/editprofile', 'UserController@update');