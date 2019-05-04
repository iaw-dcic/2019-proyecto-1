<?php


Route::get('/', function () {
    return view('welcome');
});

//Routes for user

Auth::routes();

//Seccion usuarios
Route::get('/users','UserController@index')->name('users.index');

Route::get('/{user}','UserController@show')
        ->where('user','[0-9]+')
        ->name('users.show');

Route::get('/list/{id}',"ListController@show")->name('showlist');

//Seccion crear lista

Route::get('/create_list',"ListController@create")->name('create_list')->middleware('auth');

Route::post('/create_list',"ListController@store")->middelware('auth');

//Seccion agregar pelis y editar pelis 

Route::get('/editlist/{id}','MovieController@create')->name('editlist')->middleware('auth');

Route::post('/editlist/{id}',"MovieController@store")->middleware('auth');

//Editar - eliminar peliculas

Route::delete('/editlist','MovieController@destroy')->name('delete_movie')->middleware('auth');

Route::post('/editlist', 'MovieController@edit')->name('edit_movie')->middleware('auth');

//Editar usuario

Route::get('/edit','UserController@edit')->name('edituser')->middleware('auth');

Route::post('/edit','UserController@update')->middleware('auth');

//Seccion mis listas

Route::get('/lists','UserController@mylists')->name('lists')->middleware('auth');

Route::delete('/lists','ListController@destroy')->name('delete_list')->middleware('auth');

Route::post('/lists', 'ListController@edit')->name('edit_list')->middleware('auth');

//Routes for lists of elements

Route::get('/home','UserController@index')->name('home');





