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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{id}', 'PagesController@profile')->name('profile')->where('id', '[0-9]+');

Route::get('/list/create', 'PagesController@createlist')->name('createlist');

Route::post('/list/create', 'PagesController@store')->name('listcreate');

Route::get('/list/{id}', 'PagesController@list')->name('list');

Route::patch('/list/{id}', 'PagesController@update');

Route::get('/list/{id}/car/create', 'PagesController@createcar');

Route::post('/list/{id}/car/create', 'PagesController@storecar');

Route::get('/list/{id}/car/{carid}/edit', 'PagesController@editcar');

Route::patch('/list/{id}/car/{carid}/update', 'PagesController@updatecar');

Route::delete('/list/{id}/car/{carid}/edit', 'PagesController@deletecar');

Route::get('/publiclists', 'PagesController@publiclists')->name('publiclists');

Route::patch('/profile/{id}', 'PagesController@editprofile');

Route::get('/profile/{id}/lists', 'PagesController@userlists')->name('userlists');

Route::delete('/list/{id}', 'PagesController@deletelist');

Route::get('/readme', 'PagesController@readme')->name('readme');
