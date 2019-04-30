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
Route::get('/home','CollectionController@index')->middleware('auth');

Route::get('/home/perfil','UserController@index')->middleware('auth');
Route::post('/home/perfil','UserController@update')->middleware('auth');

//Libros
Route::get('/home/loadBooks/{id}', 'BookController@index')->middleware('auth');
Route::post('/home/loadBooks/{id}', 'BookController@store')->middleware('auth');

Route::get('/home/loadBooks/deleteBook/{id}','BookController@load2')->middleware('auth');
Route::post('/home/loadBooks/deleteBook/{id}','BookController@delete')->middleware('auth');

Route::get('/home/loadBooks/editBook/{id}','BookController@load')->middleware('auth');
Route::post('/home/loadBooks/editBook/{id}','BookController@update')->middleware('auth');


//Colecciones
Route::get('/home/storeCollection','CollectionController@load')->middleware('auth');
Route::post('/home/storeCollection','CollectionController@store')->middleware('auth');

Route::get('/home/storeCollection/deleteCollection/{id}','CollectionController@load2')->middleware('auth');
Route::post('/home/storeCollection/deleteCollection/{id}','CollectionController@delete')->middleware('auth');

Route::get('/home/storeCollection/editCollection/{id}','CollectionController@loadcollection')->middleware('auth');
Route::post('/home/storeCollection/editCollection/{id}','CollectionController@update')->middleware('auth');



