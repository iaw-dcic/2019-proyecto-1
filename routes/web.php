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

Route::get('/ingresar', 'ingresarController@ingresar');

Route::get('/registrar', 'ingresarController@registrar');

Route::get('/registrar/condiciones', 'ingresarController@condiciones');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
