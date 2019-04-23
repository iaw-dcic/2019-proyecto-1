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
//como hacer la lista => campos editables
//poner que un boton lleve a una nueva pagina dentro de un .blade.php => no hay problema
//esta bien hecho el store?
//el action en el form de edit y create.blade


//para ponerle el nombre de la lista, le puedo poner el nombre de la lista como un campo invisible
//no editable en el form, y ahi queda parte del request para asociarlo en el controlador

//separar el controlador de lista y de cancion