<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user','UserController@index');

Route::get('/user/login','UserController@login')->name('users.login');

Route::get('/user/register','UserController@create')->name('users.register');

Route::post('user/create','UserController@store');

//Route::get('/navbar','NavbarController@index');

Route::get('/search',"SearchController@index")->name('search');


