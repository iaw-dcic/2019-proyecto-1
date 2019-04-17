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

//Get home
Route::get('/', 'ControladorInicio@index');

//Get agregar
Route::get('/agregar', 'ControladorAgregar@agregar');

//Get editar
Route::get('/editar', 'ControladorEditar@editar');

//Get eliminar
Route::get('/eliminar', 'ControladorEliminar@eliminar');
