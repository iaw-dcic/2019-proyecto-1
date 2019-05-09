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

//route::get('/home/buscar', "HomeController@buscar");

route::get('/ver_lista', "HomeController@ver_lista");
route::get('/ver_perfil', "HomeController@ver_perfil");

Route::get('/perfil', 'UserController@profile')->name ('Profile')->middleware('auth');
Route::post('/perfil', 'UserController@update_profile')->middleware('auth');


Route::get('/mis_listas','ListaController@mis_listas')->middleware('auth');
Route::get('/mis_listas/crear_lista' ,'ListaController@crear_lista')->middleware('auth');
Route::post('/mis_listas/crear_lista' ,'ListaController@crear_lista_BD')->middleware('auth');
Route::get('/mis_listas/modificar_lista' ,'ListaController@modificar_lista')->middleware('auth');
Route::post('/mis_listas/modificar_lista' ,'ListaController@modificar_lista_BD')->middleware('auth');
Route::get('/mis_listas/eliminar_lista' ,'ListaController@eliminar_lista_BD')->middleware('auth');

Route::get('/mis_listas/ver_elementos/' ,'PosteoController@ver_elementos')->middleware('auth');

Route::get('/mis_listas/agregar_elemento/' ,'PosteoController@agregar_elemento')->middleware('auth');
Route::post('/mis_listas/agregar_elemento/' ,'PosteoController@agregar_elemento_BD')->middleware('auth');
Route::get('/mis_listas/eliminar_elemento/','PosteoController@eliminar_elemento_BD')->middleware('auth');
Route::get('/mis_listas/modificar_elemento/','PosteoController@modificar_elemento')->middleware('auth');
Route::post('/mis_listas/modificar_elemento/','PosteoController@modificar_elemento_BD')->middleware('auth');



Auth::routes();


