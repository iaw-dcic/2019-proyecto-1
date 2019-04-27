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
Route::get('/index', 'UserController@index');

/** Ruta para registrarse */
Route::get('index/registrarse', 'UserController@registro');

/**Ruta hacia la configuracion del usuario para configurar sus vistas 
 * Para eso la enlazo con el controlador User Controller y la funcion es show
*/
Route::get('/index/{id}', 'UserController@show');



 