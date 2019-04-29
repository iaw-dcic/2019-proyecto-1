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

Auth::routes();

Route::get('/', 'PagesController@welcome')->name('welcome');
Route::get('/home', 'PagesController@index')->name('home');

Route::get('/user/{username}', 'UsersController@show')->name('user.show');
Route::get('/user/{username}/edit', 'UsersController@edit')->name('user.edit');
Route::patch('/user/{username}', 'UsersController@update')->name('user.update');

Route::resource('items', 'ItemsController');
Route::resource('collections', 'CollectionsController');

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));