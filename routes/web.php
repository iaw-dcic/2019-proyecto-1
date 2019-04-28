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

//Pages
Route::get('/','PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/searchlisting', 'PagesController@searchListing');

//Games resource
Route::resource('games','GamesController');

//Auth
Auth::routes(['verify'=> true]);
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

//Searching
Route::get('/searchUser/{userSearch}', 'SearchUserController@searchUser');
Route::get('/searchUser', 'SearchUserController@searchUser');
Route::get('/searchUser/listings/{userId}', 'SearchUserController@getUserListings')->name('user_listings');

Route::get('/profile/{username}', 'UserController@getUserProfile')->name('user_profile');
Route::post('/profile/{username}','UserController@update_avatar')->name('update_avatar');


Route::get('/deleteGameFromListing/{game}/{listing}','ListingsController@deleteGameFromListing')->name('delete_game_from_listing');
Route::resource('listings','ListingsController');



