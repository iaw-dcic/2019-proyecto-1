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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'WelcomeController@index')
    ->name('welcome')
    ->middleware('guest');

//Vistas para login y register
Route::get('/login', 'Auth\LoginController@getViewLogin');
Route::get('/register', 'Auth\RegisterController@getViewRegister');

//Envio de formularios para login y register
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

//Consulta AJAX para Login
Route::post('/login/verifyEmailAndPassword', 'Auth\LoginController@verifyEmailAndPassword');
//Consultas AJAX para registro
Route::post('/register/verifyUsername', 'Auth\RegisterController@verifyUsername');
Route::post('/register/verifyEmail', 'Auth\RegisterController@verifyEmail');

//Login con redes sociales
Route::get('/login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('/login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

//Usuario
Route::get('/profile', 'UsersController@viewProfile')->name('profile')->middleware('auth');;
Route::get('/user/search', 'UsersController@searchUsernames');
Route::post('/user/{username}', 'UsersController@update');
Route::resource('user', 'UsersController')->only([
    'store', 'show', 'destroy'
]);

//Posts
Route::resource('posts', 'PostsController')->only([
    'store', 'show', 'edit', 'update', 'destroy'
]);

Route::get('/posts/{post_id}/comments', 'CommentsController@index');
Route::post('/posts/{post_id}/comments', 'CommentsController@store');
Route::put('/posts/{post_id}/comments/{id}', 'CommentsController@edit');
Route::delete('/posts/{post_id}/comments/{id}', 'CommentsController@destroy');
