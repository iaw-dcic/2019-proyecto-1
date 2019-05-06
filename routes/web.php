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

Route::get('/GaleriaPelitecas', 'UserController@index')->name('GaleriaPelitecas');
Route::get('/PelitecaShower/{id}', 'PelitecaShowerController@index')->name('PelitecaShower');
Route::resource('Generos','GeneroController');

Route::get('/home/{nom}/{cate}','CategoriaController@destroy')->name('home');
Route::get('/home/{nom}','CategoriaController@edit')->name('home');
Route::get('/Persona','PersonalController@index');

Route::post('/PelitecaShower', 'PelitecaShowerController@store')->name('PelitecaShower');

//Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
//Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{provider}','Auth\SocialAuthController@redirectToProvider');
Route::get('/login/{provider}/callback','Auth\SocialAuthController@handleProviderCallback');

Route::get('/About','AboutController@index');

Route::resource('users', 'UserController');