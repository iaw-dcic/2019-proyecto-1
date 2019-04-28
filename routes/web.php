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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile','ProfileController@showProfile')->name('profile');

Route::get('/profile/{id}/edit','ProfileController@editProfile')->name('editProfile');

Route::post('/home','HomeController@addItem')->name('addItem');

Route::get('/home','HomeController@getTable')->name('getTable');

Route::delete('/home/{task}','HomeController@destroy')->name('destroy');

Route::get('/profile/{user}','ProfileController@showPublicProfile')->name('showPublicProfile');

Route::get('/','WelcomeController@get');