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

Route::get('/', 'PagesController@home');

Route::resource('songs', 'SongsController')->middleware('auth');

Route::get('/profile', 'PagesController@profile')->middleware('auth');

//En app/http/controllers estan todos los controladores
//Es obligatorio usar templates
//php artisan make:controller nombreDelPhp   para crear un controlador
//En database/migrations estan las tablas de datos
//Investigar sobre como agregar usuarios falsos

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Preguntar por:
//la foreign key doble en create lists table en database
//como poner List::find etc en ListController.php
//como hacer la lista
//poner que un boton lleve a una nueva pagina dentro de un .blade.php
//esta bien hecho el store?
//el action en el form de edit y create.blade
//BigIncrement define como primario?

//recordar modificar el .env