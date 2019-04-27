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


Route::get('user/{userid}/list', 'ListaController@publicLists');
Route::resource('/list', 'ListaController');

Route::get('user/{userid}/list', 'ListaController@indexAll');

Route::resource('/profile', 'ProfileController');

//Route::get('profile/', 'ProfileController@index');





Route::get('/template', function () {
    return view('template');
});