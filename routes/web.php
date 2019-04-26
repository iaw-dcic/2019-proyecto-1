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


Route::get('/profile','listsController@index')->name('profile');

Route::get('/profile/list',function(){ //example.com/list (needs List name)
    return view('list');
})->name('lists');

Route::get('/readme',function(){
    return view('/readme');
})->name('readme');

Route::resources([
    'lists' => 'listsController',
    'games' => 'gamesController'
]);

Route::get('/profile/createList', 'listsControler@create')->name('createList')->middleware('auth');

Route::post('/profile','listsController@store')->name('profile')->middleware('auth');

Route::get('/publicLists', 'publicListsController@index')->name('public_Lists');

Route::get('/profile/createGame', 'gameController@create');
Route::post('/profile/createGame', 'gameController@store');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
