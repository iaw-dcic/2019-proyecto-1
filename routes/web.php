<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home','MovieController@index');

Route::get('/users/{user}/edit','UserController@edit')->name('user.edit');

Route::put('users/{user}','UserController@update');

Route::get('/users','UserController@index')->name('users.index');

Route::get('users/{user}','UserController@show')
    ->where('user','[0-9]+')
    ->name('users.show');

Route::get('lists/{id}','MovieController@show')
    ->where('id','[0-9]+')
    ->name('lists.show');

Route::get('lists/new','MovieController@create');


//Socialite
Route::get('login/{provider}','Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');