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

Route::get('/', 'PageController@inicio')->name('index');

Route::get('/login/facebook')->name('login-facebook');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/profiles', 'ProfileController@store');
Route::get('/profiles/{id}', 'ProfileController@index');

Route::post('/lista-libros/create', 'ListaLibroController@store')->name('crearListaLibros');
Route::get('/users', 'PageController@search')->name('search-profile');   
Route::delete('/lista-libros/{id}', 'ListaLibroController@destroy')->name('delete-lista-libros');
Route::get('/lista-libros', 'ListaLibroController@index')->name('listaLibros');
Route::get('/lista-libros/{id}', 'LibroController@create')->name('add-libro');
Route::post('/lista-libros/{id}/add', 'LibroController@store')->name('store-libro');

Route::get('/editProfile', 'PageController@editProfile')->name('editProfile');

//facebook

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');