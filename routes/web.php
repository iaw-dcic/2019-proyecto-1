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
/*Route::get('/', 'HomeController@getHomeView');
Route::get('/home', 'HomeController@getHomeView');*/
Route::get('/','PagesController@home');

// My games
Route::get('/games', 'PagesController@games');

// About 
Route::get('/about', 'PagesController@about');

// Login
Route::get('/login', 'PagesController@login');

// Register
Route::get('/register', 'PagesController@register');

