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

Route::resource('albums', 'AlbumsController')->middleware('auth');

Route::get('/profile', 'PagesController@profile')->middleware('auth')->name('profile');

//Es obligatorio usar templates
//php artisan make:controller nombreDelPhp -r para crear un controlador
//Investigar sobre como agregar usuarios falsos
//la lista son campos editables
//poner que un boton lleve a una nueva pagina dentro de un .blade.php => no hay problema

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Preguntar por que, a pesar de que le puse el nombre createAlbum.blade.php para albums/createAlbum,
//se registra el directorio como albums/create

//Preguntar por que se borran los usuarios cada vez que hago migrate:rollback

//Que va en el validate =>required()? (en el controller). Y en el fillable?




//para ponerle el nombre de la lista, le puedo poner el nombre de la lista como un campo invisible
//no editable en el form, y ahi queda parte del request para asociarlo en el controlador

//Album es el tipo
//album es la variable
//albums es la direccion