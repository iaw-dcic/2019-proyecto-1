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

Route::get('/edit/{user}','UserController@edit')->name('edit');

Route::put('/edit/{user}','UserController@update');

Route::get('/lists','UserController@mylists')->name('lists');

//Routes for lists of elements

Route::get('/home','MovieController@index')->name('home');

Route::get('/create_list',"ListController@create")->name('create_list');

Route::post('/create_list',"ListController@store");

Route::post('/editlist', 'MovieController@create');

Route::get('/editlist/{id}', 'ListController@edit')->name('editlist');




//Socialite
Route::get('login/{provider}','Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');