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

Route::get('profile/{id}', 'PagesController@profile')->name('profile')->where('id', '[0-9]+');

Route::get('/list/create', 'PagesController@createlist');

Route::post('/list/create', 'PagesController@store');

Route::get('/list/{id}', 'PagesController@list')->name('list');

Route::patch('/list/{id}', 'PagesController@update');
