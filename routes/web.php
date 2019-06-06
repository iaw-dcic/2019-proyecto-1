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

/* Agrego el ruteo las operaciones basicas CRUD de posts. */
Route::resource('posts','PostsController')->except(['show']);

/* Agrego el ruteo las operaciones basicas CRUD de paginas. */
Route::resource('pages','PagesController');

/* Agrego el ruteo las operaciones basicas CRUD de collections. */
Route::resource('collections','CollectionsController'); 


Route::get('/home', 'HomeController@index');

Route::put('/pages/{user}','PagesController@update'); 

Route::get('/users/{id}', 'PagesController@user');

Route::get('/users/edit/{id}', 'PagesController@edit');


/* Routes created for authentication */
Auth::routes();

/* Routes for Twitter log in */
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');