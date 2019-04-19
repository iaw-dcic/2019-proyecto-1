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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix' => 'admin'],function(){
    
    //creamos todas las rutas posibles de un usuario con 'resource'
    Route::resource('users','UsuariosController');


});




//si ninguna ruta matchea
Route::fallback(function(){
    echo "esto es un 404";


});
