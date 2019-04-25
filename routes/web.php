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

Route::get('/', 'PagesController@getHome')->name('home');
Route::get('/home', 'PagesController@getHome')->name('home');
Route::get('/profile', 'PagesController@getProfile')->name('profile');
Route::get('/signin', 'PagesController@getSignIn')->name('signin');
Route::get('/guest', 'PagesController@getGuest')->name('guest');
Route::get('/settings', 'PagesController@getSettings')->name('settings');


Route::get('/goals', 'goalsController@getGoals')->name('goals');

Route::get('/myLists', 'listsController@getMyLists')->name('myLists');
