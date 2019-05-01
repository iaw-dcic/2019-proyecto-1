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

Route::get('/updateUser','ApiController@updateUser')->name('updateUser');
Route::get('/about','ApiController@about')->name('about');

Route::post('/updateUser','ApiController@updatePost')->name('updatePost');


Route::post('/update','AlbumController@update')->name('update');
Route::get('/showAlbum/{id}','AlbumController@show')->name('showAlbum');


Route::get('/profile', 'ApiController@profile')->name('profile');
Route::post('profile','ApiController@updateAvatar')->name('avatar');




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


Route::get('/home', 'ApiController@index')->name('home');
Route::post('/createAlbum','AlbumController@store');

Route::get('/showUser/{id}','ApiController@showUser')->name('showUser');

Auth::routes();
Route::get('/album/{id}','AlbumController@destroy')->name('eliminarAlbum');
Route::get('/edit/{id}','AlbumController@edit')->name('editAlbum');


Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
