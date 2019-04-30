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

//Inicio
Route::get('/', 'ControladorVistas@index');


//Eliminar
Route::get('/miPerfil/{id}', 'ControladorVistas@miPerfil')-> middleware('auth');

Route::get('/editarPerfil', 'ControladorVistas@editarPerfil')-> middleware('auth');
Route::post('/editarPerfil', 'UserController@editarPerfil')-> middleware('auth');

Route::post('/actualizarIdLista', 'SeriesController@actualizarIdLista')-> middleware('auth');

//Iniciar Sesion
Auth::routes();

Route::resource('serie','SeriesController');
Route::resource('listas','ListaUsuariosController');