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

/*
Route::get('/', function () {
    return view('main');
});
*/
route::get('/', "HomeController@index")->name ('Home');
route::get('/home', "HomeController@index")->name ('Home');

route::get('/home/buscar', "HomeController@buscar");

Route::get('/perfil', 'UserController@profile')->name ('Profile');
Route::post('/perfil', 'UserController@update_profile');

Route::get('/postear' ,'PosteoController@postear')->name('postear');
Route::post('/postear','PosteoController@crear_post');


Auth::routes();


