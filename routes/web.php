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

Route::resource('albums/{album}/songs', 'SongsController')->middleware('auth')->only(['create','store','edit','update','destroy']);

Route::resource('albums', 'AlbumsController');

Route::resource('profiles', 'UserProfileController')->only(['show','edit','update','destroy']);

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/browse', 'PagesController@browse')->name('browse');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Dudas
//--ES necesario ponerle el link del bootstrap? porque en el registrar parece que ya lo usaba por defecto. si, es necesario
//--Poner el bootstrap como async mejora la performance. esta bien? lo puse al final del body
//--Procfile?? en la carpeta public?
//--Que se hace despues de modificar el appserviceprovider?
//--al editar en el songcontroller llamo al show de albumcontroller, esta bien? esta bien
//--view o redirect en el songcontroller
//--se tiene que acceder a las listas de un usuario especifico? aclarar en el about
//--la forma de poner los css? esta bien
//--informar los audits? si quiero
//--campos de edicion de usuario-esta bien asi

//BORRAR TODO ESTO
//SACAR TODOS LOS BACK
//PASAR EL LINK DEL HEROKU EN EL PULLREQUEST
//PONERLE COSAS A LA BASE EN EL HEROKU DESPUES DE HACERLO ANDAR. TENGO QUE CARGAR EL ENV CON LOS 4 VALORES QUE
//ME DA Y AHI HACER EL MIGRATE. ABRO LA PAGINA DESDE EL HEROKU Y LE METO COSAS