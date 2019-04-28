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
Route::get('/', 'HomeController@index');


Route::get('/listas', 'ListasController@index')->name('listas.index');
Route::get('/listas/create','ListasController@create')->name('listas.create');
Route::post('/listas/create','ListasController@store')->name('listas.store');
Route::get('/listas/{id}/edit','ListasController@edit')->name('listas.edit');
Route::patch('/listas/{id}','ListasController@update')->name('listas.update');
//Route::get('/listas/{id}/canciones','ListasController@show');
//  el show de listas es el index de canciones.....
Route::delete('/listas/{id}','ListasController@destroy')->name('listas.destroy');


Route::get('/listas/{id}','CancionesController@index')->name('canciones.index');   
Route::get('/listas/{id}/create','CancionesController@create')->name('canciones.create');
Route::post('/listas/{id}/create','CancionesController@store')->name('canciones.store');
Route::get('/listas/canciones/{id}/edit','CancionesController@edit')->name('canciones.edit');
Route::patch('/listas/canciones/{id}','CancionesController@update')->name('canciones.update');

// solo preciso el id de la cancion, el de la lista lo recupero del objeto cancion
Route::delete('/listas/canciones/{id}','CancionesController@destroy')->name('canciones.destroy');


Route::resource('users','UsuariosController');
/*
Route::group(['prefix' => 'admin'],function(){
    
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
    
                //usuarios      //controlador
    Route::resource('users','UsuariosController');



    Route::resource('listas','UsuariosController');

});*/



//si ninguna ruta matchea
Route::fallback(function(){
    echo "esto es un 404";
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
