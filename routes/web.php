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

Route::get('/', 'listacontroller@listaspublicas');

Route::get('/perfil/{id}', 'usercontroller@mostrarperfil');
Route::get('/miperfil/', 'usercontroller@mostrarmiperfil')->name('miperfil');
Route::get('/listaspublicas', 'listacontroller@listaspublicas');
Route::get('/lista/modificar/{id}', 'listacontroller@modificarlista')->name('modificarlista');
Route::post('/lista/modificar', 'peliculacontroller@crearpelicula');
Route::get('/lista/get/{id}', 'listacontroller@getlista')->name('getlista');
Route::get('/lista/eliminar/{id}', 'listacontroller@eliminarlista');
Route::get('/lista/crear', 'listacontroller@creacionlista');
Route::post('/lista/crear', 'listacontroller@crearlista');
Route::get('/pelicula/remove/{id}', 'peliculacontroller@eliminarpelicula');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
