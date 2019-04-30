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

// Guest
Route::get('/', 'GuestController@welcome')->name('welcome');

Auth::routes();

Route::get('/usuario/perfil', 'ProfileController@index')->name('perfil');

//Listas de bienes
Route::get('/usuario/mis-listas', 'ListController@showAll')->middleware('auth')->name('mis-listas');
Route::get('/usuario/mis-listas/{id}', 'ListController@show')->middleware('auth')->name('show-lista');

Route::get('/usuario/crear-lista', function(){
    return view('listas.crear');
})->middleware('auth')->name('crear-lista');

Route::post('/usuario/crear-lista', 'ListController@create')->middleware('auth')->name('crear-lista');

Route::post('/usuario/eliminar-lista/{id}', 'ListController@eliminar')->middleware('auth')->name('eliminar-lista');

// libro
Route::get('/usuario/mis-listas/{id}/crear-libro', function($id){
    return view('libros.crear', ['id' => $id]);
})->middleware('auth')->name('crear-libro');

Route::post('/usuario/mis-listas/{id}/crear-libro', 'BookController@create')->middleware('auth')->name('crear-libro');

Route::get('/usuario/mis-listas/{id}/eliminar-libro/{book}', 'BookController@destroy')->middleware('auth')->name('eliminar-libro');


Route::get('/prueba', function (){
    return view('prueba');
})->name('prueba');
