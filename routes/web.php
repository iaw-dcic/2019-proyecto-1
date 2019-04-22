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

//Home
Route::get('/', 'ControladorVistas@index');

//Agregar
Route::get('/agregar', 'ControladorVistas@agregar') -> middleware('auth');
Route::post('agregar', 'SeriesController@store')-> middleware('auth');

//Editar
Route::get('/editar/{id}', 'ControladorVistas@editar')-> middleware('auth');
Route::post('editar', 'SeriesController@update')-> middleware('auth');

//Eliminar
Route::get('/miPerfil', 'ControladorVistas@miPerfil')-> middleware('auth');

//Iniciar Sesion
Route::get('/login', 'Auth\LoginController@showLoginForm') -> name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout') -> name('logout');

Auth::routes();

Route::resource('serie','SeriesController');
