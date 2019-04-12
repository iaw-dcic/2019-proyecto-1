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

//Rutas de ejemplo TUTORIAL

Route::get('/movies', function () {
    return 'Estas queriendo acceder a las películas';
});

Route::get('movie/{id}', function ($id) {
    return 'Estas queriendo acceder a la películas con id : '.$id;
})->where('id', '[0-9]+');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
