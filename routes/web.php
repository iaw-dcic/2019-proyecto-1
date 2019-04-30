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

Route::get('/home/cargarlibros/{id}', 'BookController@index')->middleware('auth');
Route::post('/home/cargarlibros/{id}', 'BookController@store')->middleware('auth');
Route::delete('/home/cargarlibros/{id}', 'BookController@delete')->middleware('auth');
//Route::post('/home/cargarlibros/{id}', 'BookController@update')->middleware('auth');


Route::get('/home','CollectionController@index')->middleware('auth');

Route::get('/home/editCollection','CollectionController@load')->middleware('auth');
Route::post('/home/editCollection','CollectionController@store')->middleware('auth');
Route::post('/home/editCollection/{id}','CollectionController@delete')->middleware('auth');
Route::get('/home/editCollection/edit/{id}','CollectionController@loadcollection')->middleware('auth');
Route::post('/home/editCollection/edit/{id}','CollectionController@update')->middleware('auth');

Route::get('/home/perfil','UserController@index')->middleware('auth');
Route::post('/home/perfil','UserController@update')->middleware('auth');

