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
    //creamos las rutas para el login y el home
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index');



    //creamos las rutas de las listas
    Route::get('/listas/public', 'ListasController@index')->name('listas.index');
    Route::get('/listas/create','ListasController@create')->name('listas.create');
    Route::post('/listas/create','ListasController@store')->name('listas.store');
    Route::get('/listas/{id}/edit','ListasController@edit')->name('listas.edit');
    Route::patch('/listas/{id}','ListasController@update')->name('listas.update');
    //Route::get('/listas/{id}/canciones','ListasController@show');
    //  el show de listas es el index de canciones.....
    Route::delete('/listas/{id}','ListasController@destroy')->name('listas.destroy');
    Route::get('/listas/private','ListasController@indexPriv')->name('listas.indexPriv');



    //creamos las rutas de las canciones
    Route::get('/listas/{id}','CancionesController@index')->name('canciones.index');   
    Route::get('/listas/{id}/create','CancionesController@create')->name('canciones.create');
    Route::post('/listas/{id}/create','CancionesController@store')->name('canciones.store');
    Route::get('/listas/canciones/{id}/edit','CancionesController@edit')->name('canciones.edit');
    Route::patch('/listas/canciones/{id}','CancionesController@update')->name('canciones.update');
    // solo preciso el id de la cancion, el de la lista lo recupero del objeto cancion
    Route::delete('/listas/canciones/{id}','CancionesController@destroy')->name('canciones.destroy');


    
//creamos todas las rutas posibles de un usuario con 'resource'
    /*
    URI:
    GET /admin/users    (index)
    GET /admin/users/create (create)
    GET /admin/users/1  (show)
    POST /admin/users/store (store)
    GET /admin/users/1/edit (edit)
    PATCH /admin/users/1 (update)
    DELETE /admin/users/1  (destroy)
    */
    Route::resource('users','UsuariosController');