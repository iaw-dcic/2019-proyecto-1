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

Route::get('/', 'PageController@index');

Route::get('/users', 'PageController@users');

Route::get('/about', 'PageController@about');

Route::get('/contact', 'PageController@contact');

Route::get('/settings', 'PageController@settings');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Rutas para playlists */
//GET PLAYLISTS DE USER @index
Route::get('{user}/playlists', 'PlaylistsController@index')->name('playlists');

//POST PLAYLIST NUEVA DE USER @store
Route::post('{user}/playlists', 'PlaylistsController@store');

//CREAR NUEVA PLAYLIST DE USER @create
Route::get('{user}/create', 'PlaylistsController@create');

//VER PLAYLIST DE USER @show
Route::get('{user}/{playlist}', 'PlaylistsController@show');

//BORRAR PLAYLIST @destroy
Route::delete('/playlists/{playlist}', 'PlaylistsController@destroy');

//EDITAR PLAYLIST DE USER @edit
Route::get('{user}/{playlist}/edit', 'PlaylistsController@edit');

//GUARDAR EDICION PLAYLIST DE USER @update
Route::patch('{user}/{playlist}', 'PlaylistsController@update');

//Route::resource('{user}/playlists', 'PlaylistsController');

