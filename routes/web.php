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

//THIS READS AS: "When i get the Homepage route, return the view called "welcome"
Route::get('/', function () {
    return view('welcome');
});


Route::get('/profile','listsController@index');

Route::get('/profile/list',function(){ //example.com/list (needs List name)
    return view('list');
});

Route::get('/profile/createList', 'listsControler@create');

Route::post('/profile','listsController@store');

Route::get('/publicLists', function(){
    return view('publicLists');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
