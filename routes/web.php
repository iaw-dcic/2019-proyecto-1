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

Route::get('/', "PageController@index");

Route::get('/about', "PageController@about");

Route::get('/services', "PageController@services");

Route::resource('posts', "PostsController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/{id}', 'UsersProfileController@show');

Auth::routes();

Route::resource('home', 'HomeController');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');