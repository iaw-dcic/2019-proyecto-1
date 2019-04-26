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

Route::get('/inventario', function () {
    return 'inventario';
});

Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');
Route::get('/listas/nuevo', 'MovieController@create');

Route::post('/home', 'MovieController@store')->name('movie.store');

Route::get('/usuarios', 'UserController@index')->name('users.index');

Route::get('/usuarios/{user}', 'UserController@show')
	->where('user','[0-9]+')
	->name('users.show');
	
Route::get('/listas/{usermovie}', 'MovieController@show')
	->where('usermovie','[0-9]+')
	->name('lists.show');
	
Route::get('/home', 'MovieController@index');

Auth::routes();

Auth::routes(['register' => false]);

Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');

Route::put('/usuarios/{user}', 'UserController@update');

Route::post('/usuarios', 'UserController@store');	

Route::get('/listas/{usermovie}/addmovie', 'MovieItemController@create')
	->where('usermovie','[0-9]+');
	
Route::get('/listas/{usermovie}/movies', 'MovieItemController@index')
	->where('usermovie','[0-9]+');
	
Route::post('/listas/{usermovie}', 'MovieItemController@store');	
	
// Route::get('/home', 'HomeController@index')->name('home');

