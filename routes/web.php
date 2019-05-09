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

Route::get('/home', 'HomeController@inicio')->name('home');

Route::get('/GaleriaPelitecas', 'UserController@index')->name('GaleriaPelitecas');
Route::get('/PelitecaShower/{id}', 'PelitecaShowerController@index')->name('PelitecaShower');

Route::get('/PelitecaEditor/{id}', 'PelitecaEditorController@index')->name('PelitecaEditor')->middleware('auth');
Route::delete('/PelitecaEditor/{id}', 'PelitecaEditorController@destroy')->middleware('auth');
Route::put('/PelitecaEditor/{id}', 'PelitecaEditorController@update')->middleware('auth');
Route::post('/PelitecaEditor/Generos', 'GeneroController@store')->name('Genero')->middleware('auth');

Route::get('/About','AboutController@index');
Route::get('/logout','HomeController@inicio')->middleware('auth');

Route::resource('Generos','GeneroController');
Route::resource('users', 'UserController')->middleware('auth');

