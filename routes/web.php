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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'session'],function()
{
	//manejo de listas
	Route::resource('listas','ListasController')->middleware('auth');
	Route::get('/listas/{lista}/destroy',[
		'uses' => 'ListasController@destroy',
		'as' => 'listas.destroy'])->middleware('auth');
	
	
	//manejo de libros.create
Route::get('/libros/create/{id}',[
		'uses' => 'LibrosController@create',
		'as' => 'libros.create'])->middleware('auth');

Route::post('/libros/store/{id}',[
		'uses' => 'LibrosController@store',
		'as' => 'libros.store'])->middleware('auth');

Route::get('/libros/edit/{id}',[
		'uses' => 'LibrosController@edit',
		'as' => 'libros.edit'])->middleware('auth');

Route::put('/libros/update/{id}',[
		'uses' => 'LibrosController@update',
		'as' => 'libros.update'])->middleware('auth');

Route::get('/libros/destroy/{id}',[
		'uses' => 'LibrosController@destroy',
		'as' => 'libros.destroy'])->middleware('auth');



	//manejo de perfil
Route::get('/profiles/create',[
		'uses' => 'ProfilesController@create',
		'as' => 'profiles.create'])->middleware('auth');

Route::get('/profiles/edit',[
		'uses' => 'ProfilesController@edit',
		'as' => 'profiles.edit'])->middleware('auth');

Route::post('/profiles/store',[
		'uses' => 'ProfilesController@store',
		'as' => 'profiles.store'])->middleware('auth');

Route::put('/profiles/',[
		'uses' => 'ProfilesController@update',
		'as' => 'profiles.update'])->middleware('auth');	

});



Route::get('public/{usr}','PublicController@index')->name('publica');
Route::get('public/{usr}/{id}','PublicController@show')->name('public.show');

//socialite
Route::get('/redirect', 'SocialController@redirect');
Route::get('/callback', 'SocialController@callback');



