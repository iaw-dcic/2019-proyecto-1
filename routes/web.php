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

Route::get('/', 'WelcomeController@index');
Route::get('/{coleccion}/showItems', 'WelcomeController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{user}/crearColeccion', 'ColeccionController@index');
Route::post('/{user}/crearColeccion', 'ColeccionController@create');

Route::get('/{user}/editarPerfil', 'perfilController@edit');
Route::patch('/{user}/editarPerfil', 'perfilController@update');


Route::get('/{user}/{colection}/insertarItem', 'ElementController@index');
Route::post('/{user}/{colection}/insertarItem', 'ElementController@create');
Route::patch('/{user}/{colection}/insertarItem', 'ElementController@update');
Route::delete('/{user}/{colection}/insertarItem', 'ElementController@destroy');
