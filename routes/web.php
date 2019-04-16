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

Route::get('/test', function () {
    return view('test');
});

Route::get('/about', function () {
    return view('about');
});

//Route::get('/', PageController@home);

//En app/http/controllers estan todos los controladores
//Es obligatorio usar templates
//php artisan make:controller nombreDelPhp   para crear un controlador
//En controller/auth esta todo lo del login hecho
//En .env esta la info de como conectarse a la base de datos. Debe haber uno por entorno de desarrollo
//En database/migrations estan las tablas de datos
//Investigar sobre como agregar usuarios falsos

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
