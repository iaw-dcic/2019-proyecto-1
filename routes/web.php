<?php
use GuzzleHttp\Middleware;

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

Route::get('/usuario/perfil', 'ProfileController@index')->name('perfil');

//Listas de bienes
Route::get('/usuario/mis-listas', 'ListController@showAll')->middleware('auth')->name('mis-listas');

Route::get('/usuario/mis-listas/crear-lista', function(){
    return view('/listas/crear');
})->middleware('auth')->name('crear-lista');

Route::post('/usuario/mis-listas/crear-lista', 'ListController@create')->middleware('auth')->name('crear-lista');

Route::post('/usuario/mis-listas/eliminar-lista/{id}', 'ListController@eliminar')->middleware('auth')->name('eliminar-lista');


Route::get('/prueba', function (){
    return view('prueba');
})->name('prueba');
