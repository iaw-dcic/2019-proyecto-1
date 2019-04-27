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


//Usuario no registrado

Route::get('/','NotRegisterController@loadCollection');
Route::get('/welcome','NotRegisterController@loadCollection');
Route::get('/welcome/loadbook/{id}','NotRegisterController@loadBooks');
Route::get('/welcome/profile/{id}','NotRegisterController@profile');

//Usuario registrado

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/cargarlibros/{id}', 'BookController@index');
Route::post('/home/cargarlibros/{id}', 'BookController@store');
//Route::post('/home/cargarlibros/{id}', 'BookController@delete');

Route::get('/home','CollectionController@index');

Route::get('/home/editCollection','CollectionController@load');
Route::post('/home/editCollection','CollectionController@store');
Route::post('/home/editCollection/{id}','CollectionController@delete');
Route::post('/home/editCollection/{id}','CollectionController@update');


Route::get('/home/perfil','UserController@index');
Route::post('/home/perfil','UserController@update');

