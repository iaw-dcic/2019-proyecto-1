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

Auth::routes();

Route::get('/', 'HomeController@home')->name('welcome');
Route::get('/home', 'HomeController@home')->name('home');
Route::post('/home','HomeController@filter')->name('home-filter');

Route::get('/create-list', 'Lists\ListCreatorController@index')->name('create-list');
Route::post('/create-list',['as' => 'form_url', 'uses' => 'Lists\ListCreatorController@store'])->name('create-list');

Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::get('/profile/{username}', 'ProfileController@viewprofile')->name('view.profile');
Route::post('/profile', 'UserController@update_profile')->name('user.profile.update');

Route::get('/mylists', 'Lists\MyListsController@mylists')->name('mylists');
Route::delete('/mylists', 'Lists\MyListsController@deleteList')->name('delete-list');
Route::get('/mylists/{list_id}', 'Lists\MyListsController@editList')->name('mylists.edit');
Route::post('/mylists', 'Lists\MyListsController@updateList')->name('mylists.update');

Route::get('/lists/{list_id}','Lists\ListController@getList')->name('getList');
Route::post('/lists','Lists\ListController@likeList')->name('likeList');
Route::delete('/lists','Lists\ListController@unLikeList')->name('unLikeList');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');


