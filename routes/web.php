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

Route::get('/usuarios/nuevo', 'UserController@create')->name('users.create');
Route::get('/listas/nuevo', 'MovieController@create');

Route::post('/home', 'MovieController@store')->name('movie.store');

Route::get('/usuarios', 'UserController@index')->name('users.index');

Route::delete('/usuarios/{user}', 'UserController@destroy')->name('users.delete');
Route::delete('/listas/{usermovie}', 'MovieController@destroy')->name('lists.delete');
Route::delete('/listas/{usermovie}/{movie}', 'MovieItemController@destroy')->name('movies.delete');

Route::get('/usuarios/{user}', 'UserController@show')
	->where('user','[0-9]+')
	->name('users.show');
	
Route::get('/listas/{usermovie}', 'MovieController@show')
	->where('usermovie','[0-9]+')
	->name('lists.show');
	
Route::get('/home', 'MovieController@index');

Auth::routes();

Auth::routes(['register' => false]);


Route::put('/usuarios/{user}', 'UserController@update');

Route::put('/listas/{usermovie}', 'MovieController@update');

Route::put('/listas/{usermovie}/{movie}', 'MovieItemController@update');

Route::post('/usuarios', 'UserController@store');	

Route::get('/listas/{usermovie}/addmovie', 'MovieItemController@create')
	->where('usermovie','[0-9]+');
	
Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');
Route::get('/usuarios/{usermovie}/{movie}/editar', 'MovieItemController@edit')->name('movies.edit');


Route::get('/listas/{usermovie}/editar', 'MovieController@edit')->name('lists.edit');

Route::post('/listas/{usermovie}', 'MovieItemController@store');	
	
// Route::get('/home', 'HomeController@index')->name('home');

