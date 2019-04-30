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
    return view('layouts/app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/book', 'BookController');


Route::get('user/{userid}/publicList', 'ListaController@publicLists');
Route::resource('/list', 'ListaController');


Route::prefix('profile')->name('profile.')->group(function () {
   	Route::get('edit', 'ProfileController@edit')->name('edit');
	Route::get('{id}', 'ProfileController@show')->name('show');
	Route::post('store', 'ProfileController@store')->name('store');
});


Route::get('profile/{userid}/show', 'ProfileController@show');


Route::get('/template', function () {
    return view('template');
});