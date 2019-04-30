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

Route::get('/', function () { return view('welcome'); });

Route::get('/home', 'PagesController@home');

Route::get('/readme', function () { return view('readme'); });

Auth::routes();

Route::resource('articles','ArticlesController');

Route::resource('inventories','InventoriesController');

Route::get('/inventories/{inventory}/create','ArticlesController@create')->middleware('auth');

Route::post('articles/{inventory}','ArticlesController@store')->middleware('auth');

Route::resource('users','UsersController');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');

Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');

