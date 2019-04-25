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

Route::get('/', 'HomeController@home')->name('welcome');
Route::get('/home', 'HomeController@home')->name('home');
Route::post('/home','HomeController@filter')->name('home-filter');
Route::get('/create-list', 'ListCreatorController@index')->name('create-list');
//Route::post('/create-list', 'ListCreatorController@store')->name('create-list');
Route::post('/create-list',['as' => 'form_url', 'uses' => 'ListCreatorController@store'])->name('create-list');
Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::get('/profile/{username}', 'ProfileController@viewprofile')->name('view.profile')->where('username', '[A-Za-z]+');
Route::post('/profile', 'UserController@update_profile')->name('user.profile.update');

