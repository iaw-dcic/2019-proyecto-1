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




Route::get('/editUser','EditController@edit')->middleware('auth');
Route::patch('/editUser/{user}','EditController@update')->middleware('auth');
Auth::routes();

Route::resource('things','ThingsController')->middleware('auth');
Route::get('/things/{thing}/addItems','ThingsController@addItem')->middleware('auth');

Route::get('/items/{thing}','ItemsController@show')->middleware('auth');
Route::post('/items/{thing}/store','ItemsController@store')->middleware('auth');
Route::delete('/items/{item}/destroy','ItemsController@destroy')->middleware('auth');
Route::patch('/items/{item}/update','ItemsController@update')->middleware('auth');
Route::get('/items/{item}/edit','ItemsController@edit')->middleware('auth');

Route::get('/','PagesController@index');
Route::get('/home','PagesController@index');
Route::get('/','PagesController@index');

Route::get('/show/info','PagesController@info');
Route::get('/show/{usuario}','PagesController@show');
Route::get('/show/{usuario}/showUser','PagesController@showUser');
Route::get('/show/{usuario}/{thing}','PagesController@showItem');




