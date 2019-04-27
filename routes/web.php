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
Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/profile/{user}', 'UserController@index');

Route::resource('/{user}/myLists', 'UserListsController');

Route::post('/{user}/myLists/{myList}/items', 'ListItemsController@store');
Route::delete('/{user}/myLists/{myList}/items/{item}', 'ListItemsController@destroy');
Route::get('/{user}/myLists/{myList}/items/{item}/edit', 'ListItemsController@edit');
Route::patch('/{user}/myLists/{myList}/items/{item}', 'ListItemsController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@redHome')->name('home');

Route::get('/topVoted', 'HomeController@topVoted');
Route::get('/mostViewed', 'HomeController@mostViewed');
Route::get('/newLists', 'HomeController@newLists');
