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

//Seccion crerar lista

Route::get('/create_list',"ListController@create")->name('create_list');

Route::post('/create_list',"ListController@store");

//Seccion agregar pelis y editar pelis 

Route::get('/editlist/{id}','ListController@editmovieslist')->name('editlist');

Route::post('/editlist', 'MovieController@create')->name('createmovie');

//Editar - eliminar peliculas

Route::delete('/editlist','MovieController@destroy')->name('delete_movie');

Route::post('/editlist', 'MovieController@edit')->name('edit_movie');

//Editar usuario

Route::get('/edit','UserController@edit')->name('edituser');

Route::post('/edit','UserController@update');

Route::get('/lists','UserController@mylists')->name('lists');

Route::delete('/lists','ListController@destroy')->name('delete_list');

Route::post('/lists', 'ListController@edit')->name('edit_list');


//Routes for lists of elements

Route::get('/home','UserController@index')->name('home');





