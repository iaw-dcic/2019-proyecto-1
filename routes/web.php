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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ListasPublicas', 'UserController@index')->name('ListasPublicas');
Route::get('/Coleccion/{id}', 'ColeccionController@index')->name('Coleccion');
Route::resource('Categorias','CategoriaController');

Route::get('/home/{nom}/{cate}','CategoriaController@destroy')->name('home');
Route::get('/home/{nom}','CategoriaController@edit')->name('home');
Route::get('/Persona','PersonalController@index');

//Route::get('/login{provider}','SocialAuthController@redirectToProvider');
//Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
//Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
//PARA AGREGAR UNA CATEGORIA:
Route::post('/Coleccion', 'ColeccionController@store')->name('Coleccion');
//Route::post('/Coleccion/{nom}', 'ColeccionController@destroy')->name('Coleccion');