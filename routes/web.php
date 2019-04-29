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

Route::resource('albums/{album}/songs', 'SongsController')->middleware('auth');

Route::resource('albums', 'AlbumsController')->middleware('auth');

Route::resource('profiles', 'UserProfileController');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/browse', 'PagesController@browse')->name('browse');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//en el heroku, la parte de crear un procfile en el laravel es importante.

//Si tira error 500 al hacer deploy, es porque falta el .env. Para esto se va a settings, a config vars,
//y se crea una APP_KEY y como valor lo mismo que la app key que esta en el .env.

//una vez que se esta corriendo la pagina, se va a overview, a add-ons. Buscar JawsDB MySQL o ClearDB
//ir a configurar en el add on y buscar el jaws mysql para instalarla. Poner la version gratis.
//si no andan, usar Heroku Postgres

//cuando la base de datos ya este conectada, se tiene que correr el migrate por comando de heroku

//para el pull request, voy a mi proyecto en git. Apretar en new pull request. Poner compare across 
//forks para hacer el pull req a otro repo. Poner como base el proyecto original iaw-dcic y a la 
//derecha poner el mio, con el branch master. Se deberian poder ver los commit y las diferencias entre 
//codigos. 
//Poner titulo (entrega proyecto 1) y comentario. Ahi ya esta entregado.

//Para la performance, usando chrome, ir a audits en inspect element
//probar desktop. checkear performance y accesibilidad. Simular red 3g, y poner clear storage quiza
//probarlo en varias paginas