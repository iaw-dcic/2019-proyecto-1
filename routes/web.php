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
Route::get('/readme', function () {
    return view('readme');
});

Route::get('/edit_profile','PerfilController@index');

Route::get('/create_list','ListaController@index');


Route::resource('list','ListaController');

Route::resource('profile','PerfilController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/redirect/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@callback');
