<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user','UserController@index');

Route::get('/login','LoginController@index');

Route::get('/register','RegisterController@index');

Route::get('/navbar','NavbarController@index');

Route::get('/search',"SearchController@index");

