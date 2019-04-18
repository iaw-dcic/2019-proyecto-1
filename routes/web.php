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

Route::get('/', 'PageController@inicio')->name('index');

Route::get('/login/facebook')->name('login-facebook');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/profiles', 'ProfileController@store');

Route::get('/editProfile', 'PageController@editProfile')->name('editProfile');

//facebook

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');