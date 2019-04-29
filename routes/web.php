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

Route::get('/', 'DashboardController@index')->name('dashboard');

Auth::routes();

Route::post('create', 'Auth\RegisterController@create')->name('create');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('login')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.provider.callback');
});

Route::post('updateuser', 'HomeController@updateUser')->name('updateuser');
Route::post('createlist', 'HomeController@createList')->name('createlist');
Route::post('editlist', 'HomeController@editList')->name('editlist');
Route::post('deletelist/{list_id}', 'HomeController@deleteList')->name('deletelist');

Route::post('createitem', 'HomeController@createItem')->name('createitem');
Route::post('edititem', 'HomeController@editItem')->name('edititem');
Route::post('deleteitem', 'HomeController@deleteItem')->name('deleteitem');

Route::get('getcountries', 'HomeController@getCountries');