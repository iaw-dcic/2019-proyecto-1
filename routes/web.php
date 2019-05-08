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
Route::get('/PelitecaEditor/{id}', 'PelitecaEditorController@index')->name('PelitecaEditor')->middleware('auth');

Route::delete('/PelitecaEditor/{id}', 'PelitecaEditorController@destroy')->middleware('auth');
Route::put('/PelitecaEditor/{id}', 'PelitecaEditorController@update')->middleware('auth');

Route::get('/GaleriaPelitecas', 'UserController@index')->name('GaleriaPelitecas');
Route::get('/PelitecaShower/{id}', 'PelitecaShowerController@index')->name('PelitecaShower');
Route::resource('Generos','GeneroController');

Route::get('/PelitecaEditor/{nom}/{cate}','GeneroController@destroy')->name('PelitecaEditor')->middleware('auth');
Route::get('/PelitecaEditor/{nom}','GeneroController@edit')->name('PelitecaEditor')->middleware('auth');
//Route::get('/Persona','PersonaController@index');

Route::post('/PelitecaEditor/Generos', 'GeneroController@store')->name('Genero')->middleware('auth');

//Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
//Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{provider}','Auth\SocialAuthController@redirectToProvider');
Route::get('/login/{provider}/callback','Auth\SocialAuthController@handleProviderCallback');

Route::get('/About','AboutController@index');

Route::resource('users', 'UserController')->middleware('auth');
Route::put('/PelitecaEditor/{id}', 'PelitecaEditorController@update')->middleware('auth');

//get: obtener recurso
//post: escribir algo en servidor(no modificar)
//put: actualizar
//delete: no se usa comunmente peeeeeero
//resource