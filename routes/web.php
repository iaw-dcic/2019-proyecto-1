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
                //usuarios      //controlador
    Route::resource('users','UsuariosController');



    Route::resource('listas','ListasController');

});



//si ninguna ruta matchea
Route::fallback(function(){
    echo "esto es un 404";


});
