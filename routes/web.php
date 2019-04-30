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

Route::get('usuarios/{user}/editar', 'UserController@edit')->name('users.edit');

/**GET/usuarios/{id} pagina detalles.
 * PUT/usuarios/{id} accion para actualizar.
 */
Route::put('/usuarios/{user}', 'UserController@update');



/**Ruta hacia los detalles del usuario para configurar sus vistas
 * Para eso la enlazo con el controlador User Controller y la funcion es show
*/
Route::get('/usuarios/{user}', 'UserController@show')->name('users.show');

Route::delete('/usuarios/{user}', 'UserController@destroy')->name('users.destroy');



