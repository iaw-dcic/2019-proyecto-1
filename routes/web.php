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

Route::get('registro', function () {
    return "Pagina registro";
})->name('registrar');

Route::get('ingreso','PageController@ingreso')->name('ingresar');

Route::get('/', 'PageController@inicio')->name('index');
