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

//ute::get('/', function () {
//    return view('welcome');
//});


Route::resource('things','ThingsController')->middleware('auth');
Route::get('/things/{thing}/addItems','ThingsController@addItem')->middleware('auth');

Route::get('/items/{thing}','ItemsController@show')->middleware('auth');
Route::post('/items/{thing}/store','ItemsController@store')->middleware('auth');
Route::delete('/items/{item}/destroy','ItemsController@destroy')->middleware('auth');
Route::patch('/items/{item}/edit','ItemsController@edit')->middleware('auth');

Route::get('/','PagesController@index');
Route::get('/readme','PagesController@readme');
Route::get('/show/{usuario}','PagesController@show');

Auth::routes();


