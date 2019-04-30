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
Route::get('/', 'PagesController@index');

Route::get('/userlists','UserListsController@index');
Route::post('/users/{user}/userlists','UserListsController@store');
Route::get('/userlists/{userlist}','UserListsController@show');
Route::patch('/userlists/{userlist}','UserListsController@update');
Route::delete('/userlists/{userlist}','UserListsController@destroy');

Route::post('/userlists/{userlist}/listelements', 'ListElementsController@store');
Route::patch('/listelements/{listelement}', 'ListElementsController@update');
Route::delete('/listelements/{listelement}', 'ListElementsController@destroy');

Route::get('/profile/{user}','ProfileController@show');
Route::patch('/profile/{user}','ProfileController@update');
Route::get('/profile/{user}/edit','ProfileController@edit');

Auth::routes();
Route::get('login/github', 'Auth\LoginController@redirectToGitHubProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderGitHubCallback');


