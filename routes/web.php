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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','ApiController@index');


Route::get('/albums','AlbumController@index')->name('albums');
Route::get('/albums/Createalbum','AlbumController@create')->name('createAlbum');


//Rutas de ejemplo TUTORIAL

/*
Route::get('/movies', function () {
    return 'Estas queriendo acceder a las películas';
});


Route::get('movie/{id}', function ($id) {
    return 'Estas queriendo acceder a la películas con id : '.$id;
})->where('id', '[0-9]+');
*/

//Route::get('albums/CreateAlbum','AlbumController');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/createAlbum','AlbumController@store');

Auth::routes();

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
