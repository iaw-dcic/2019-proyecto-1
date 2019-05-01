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

/**Route correspondiente para ir al inicio */
Route::get('/', 'ControladorVistas@index');


/**Route correspondientes al Perfil de cada usuario */
Route::get('/miPerfil/{id}', 'ControladorVistas@miPerfil')-> middleware('auth');

Route::get('/editarPerfil', 'ControladorVistas@editarPerfil')-> middleware('auth');
Route::post('/editarPerfil', 'UserController@editarPerfil')-> middleware('auth');

Route::get('/perfilPublico/{id}', 'ControladorVistas@perfilPublico');

Route::get('/asociarLista/{id}', 'ControladorVistas@asociarLista')->middleware('auth');

Route::post('/actualizarIdLista', 'SeriesController@actualizarIdLista')-> middleware('auth');

/**Route correspondiente al inicio de sesion y registro */
Auth::routes();

/**Route correspondientes para el manejo de la tabla "series" */
Route::resource('serie','SeriesController');

/**Route correspondientes para el manejo de la tabla "lista_usuarios */
Route::resource('listas','ListaUsuariosController');