<?php


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/user','UserController@index');

//Route::get('/login','UserController@login')->name('users.login');

//Route::get('/user/register','UserController@create')->name('users.register');

Route::post('user/create','UserController@store');
;

Route::get('/search',"SearchController@index")->name('search');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
