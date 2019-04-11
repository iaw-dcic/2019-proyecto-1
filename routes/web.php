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

// Home
Route::get('/', 'HomeController@getHomeView');
Route::get('/home', 'HomeController@getHomeView');

// My games
Route::get('/my-games', 'MyGamesController@getMyGamesView');

// About us
Route::get('/about-us', 'AboutUsController@getAboutUsView');

// Login
Route::get('/login', 'LoginController@getLoginView');

// Register
Route::get('/register', 'RegisterController@getRegisterView');

