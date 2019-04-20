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
 Route::get('editarUsuario', 'UserController@editar')->name('editarUsuario');
 
Route::get('/','RecetasController@index');
Route::get('verPerfil/{id}', 'UserController@perfil')->name('verPerfil');
Route::get('cocineros','RecetasController@cocineros')->name('cocineros');
Route::get('receta','RecetasController@receta')->name('receta');
/*  Usuarios  */

Route::post('/store', 'UserController@store');
Route::get('login', 'UserController@login')->name('login');
Route::get('crea', 'UserController@crea')->name('crea');
Route::get('logout', 'UserController@logout')->name('logout');
   
Route::get('auth/{provider}', 'UserController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'UserController@handleProviderCallback');
 