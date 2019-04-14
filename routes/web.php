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

Route::get('/login',function(){ //example.com/login
    return view('login');
});

Route::get('/register',function(){ //example.com/register
    return view('register');
});

Route::get('/passwordreset',function(){ //example.com/resetpassword
    return view('passwordreset');
});

Route::get('/profile',function(){ //example.com/profile (needs profile info)
    return view('profile');
});

Route::get('/list',function(){ //example.com/list (needs List name)
    return view('list');
});