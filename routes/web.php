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

Route::get('/', function () {
    return view('welcome');
});

/**Ruta hacia la página principal de la aplicación */
Route::get('/usuarios', 'UserController@index')->name('users.index');

/** Ruta para registrarse */
Route::get('usuarios/nuevo', 'UserController@create')->name('users.create');

Route::post('usuarios/crear','UserController@store');
/** */

/**Ruta hacia la configuracion del usuario para configurar sus vistas
 * Para eso la enlazo con el controlador User Controller y la funcion es show
*/
Route::get('/usuarios/{id}', 'UserController@show')->name('users.show');



