<?php


Route::get('/', function () {
    return view('welcome');
});

//Routes for user

Auth::routes();

Route::get('/users','UserController@index')->name('users.index');

Route::get('/{user}','UserController@show')
        ->where('user','[0-9]+')
        ->name('users.show');

Route::get('/edit','UserController@edit')->name('edituser');

Route::post('/edit','UserController@update');

Route::get('/lists','UserController@mylists')->name('lists');

Route::delete('/lists','ListController@destroy')->name('delete_list');

Route::post('/lists', 'ListController@edit')->name('edit_list');

Route::get('/editlist/{id}','ListController@editmovieslist')->name('editlist');

//Routes for lists of elements

Route::get('/home','UserController@index')->name('home');

Route::get('/create_list',"ListController@create")->name('create_list');

Route::get('/list/{id}',"ListController@show")->name('showlist');

Route::post('/create_list',"ListController@store");

Route::post('/editlist', 'MovieController@create');

Route::delete('/editlist','MovieController@destroy')->name('delete_movie');

Route::post('/editlist', 'MovieController@edit')->name('edit_movie');
