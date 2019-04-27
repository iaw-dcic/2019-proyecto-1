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

Route::get('/','PagesController@home');
Route::get('/about', 'PagesController@about');


//Route::get('/user/profile/{user}', 'UserProfileController@index')->name('user_profile')->middleware('auth');




//Route::get('/profile/{newMode}', 'PagesController@changeGamesMode');

Route::resource('games','GamesController');
//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify'=> true]);
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/searchUser/{userSearch}', 'SearchUserController@searchUser');
Route::get('/searchUser', 'SearchUserController@searchUser');

Route::get('/profile/{username}', 'PagesController@getUserProfile')->name('user_profile');

Route::resource('listings','ListingsController');



