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

Route::get('/', 'PageController@index')->name('welcome');

//Route::get('/users', 'PageController@users')->name('users');

Route::get('/readme', 'PageController@readme')->name('readme');





Auth::routes();

/* RUTAS PARA USER */

Route::get('/home', 'UserController@index')->name('home');

Route::get('{user}/profile', 'UserController@profile')->name('profile');

Route::get('/settings', 'UserController@edit')->name('settings');

Route::patch('{user}/profile', 'UserController@update');


/* RUTAS PARA PLAYLISTS */

//VER TODAS LAS PLAYLISTS (PUBLICAS) DE USER @index
Route::get('{user}/playlists', 'PlaylistsController@index')->name('playlists');

//GUARDAR PLAYLIST NUEVA DE USER @store
Route::post('{user}/playlists', 'PlaylistsController@store');

//OBTENER PAGINA PARA CREAR NUEVA PLAYLIST DE USER @create
Route::get('{user}/create', 'PlaylistsController@create')->name('create_playlist');

//VER UNA PLAYLIST DE USER @show
Route::get('{user}/{playlist}', 'PlaylistsController@show')->name('show_playlist');

//BORRAR PLAYLIST DE USER@destroy
Route::delete('/playlists/{playlist}', 'PlaylistsController@destroy');

//OBTENER PAGINA PARA EDITAR PLAYLIST DE USER @edit
Route::get('{user}/{playlist}/edit', 'PlaylistsController@edit')->name('edit_playlist');;

//GUARDAR EDICION PLAYLIST DE USER @update
Route::patch('{user}/{playlist}', 'PlaylistsController@update');

//PUBLICAR UNA PLAYLIST DE USER @publish
Route::patch('{user}/{playlist}/publish', 'PlaylistsController@publish');

//OCULTAR UNA PLAYLIST DE USER @hide
Route::patch('{user}/{playlist}/hide', 'PlaylistsController@hide');


/* RUTAS PARA VIDEOS DE PLAYLISTS */

//GUARDAR VIDEO EN PLAYLIST DE USER @store
Route::post('{user}/{playlist}/videos', 'PlaylistVideosController@store');

Route::delete('{user}/{playlist}/{video}', 'PlaylistVideosController@destroy');
