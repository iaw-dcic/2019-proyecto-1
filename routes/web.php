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

Route::get('/usuarios', 'UserController@index')->name('users.index');

Route::get('/usuarios/login', 'UserController@login')->name('users.login');

Route::get('/usuarios/{id}', 'UserController@show')
	->where('id','[0-9]+')
	->name('users.show');
	
Route::post('/usuarios', 'UserController@store');	

Route::get('/home', 'MovieController@index');

Route::get('/listas/{id}', 'MovieController@show')
	->where('id','[0-9]+')
	->name('lists.show');

Route::get('/listas/nuevo', 'MovieController@create');

Auth::routes();

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
