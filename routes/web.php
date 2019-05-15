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

Route::get('/prueba', 'PruebasController@prueba');
Route::post('/jd2decrypt', 'PruebasController@jd2decrypt');
Route::view('/jd2', 'jd2links');

// Guest
Route::get('/', 'GuestController@welcome')->name('welcome');
Route::get('/lista/{list}', 'GuestController@showList')->name('ver-lista');

// Auth
Auth::routes();

// Usuario
Route::get('/perfil/{user}', 'UserController@show')->name('ver-perfil');
Route::get('/usuario/editar-perfil', 'UserController@edit')->middleware('auth')->name('editar-perfil');
Route::post('/usuario/actualizar-perfil/', 'UserController@update')->middleware('auth')->name('actualizar-perfil');

//Listas de bienes
Route::get('/usuario/mis-listas', 'ListController@showAll')->middleware('auth')->name('mis-listas');
Route::get('/usuario/mis-listas/{list}', 'ListController@show')->middleware('auth')->name('show-lista');

Route::get('/usuario/crear-lista', function(){
    return view('listas.crear');
})->middleware('auth')->name('crear-lista');

Route::post('/usuario/crear-lista', 'ListController@create')->middleware('auth')->name('crear-lista');

Route::get('/usuario/editar-lista/{list}', 'ListController@edit')->middleware('auth')->name('editar-lista');
Route::post('/usuario/actualizar-lista/{list}', 'ListController@update')->middleware('auth')->name('actualizar-lista');

Route::post('/usuario/eliminar-lista/{list}', 'ListController@eliminar')->middleware('auth')->name('eliminar-lista');

Route::get('/usuario/actualizar-estado-lista/{list}', 'ListController@updateStatus')->middleware('auth')->name('actualizar-estado-lista');


// libro
Route::get('/usuario/mis-listas/{id}/crear-libro', function($id){
    return view('libros.crear', ['id' => $id]);
})->middleware('auth')->name('crear-libro');

Route::post('/usuario/mis-listas/{id}/crear-libro', 'BookController@create')->middleware('auth')->name('crear-libro');

Route::get('/usuario/mis-listas/{list}/editar-libro/{book}', 'BookController@edit')->middleware('auth')->name('editar-libro');
Route::post('/usuario/mis-listas/{list}/actualizar-libro/{book}', 'BookController@update')->middleware('auth')->name('actualizar-libro');

Route::post('/usuario/mis-listas/{id}/eliminar-libro/{book}', 'BookController@destroy')->middleware('auth')->name('eliminar-libro');



