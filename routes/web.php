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

Route::get('/', function(){
    return view('welcome');
});

//Añadidas luego de la ejecución del comando make:auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/readme', 'InicioController@readme')->name('readme');

// FORMULARIO PARA CREAR UN PARTIDO
Route::get('/partido','PartidoController@index')->name('partido');
//Agregar un participante a un partido
Route::post('/partido','PartidoController@crearPartido')->name('crearPartido');

//VISUALIZAR LISTAS
//Mostrar la visualización mis partidos
Route::get('/listadoPartidos','ListadoPartidosController@index')->name('listadoPartidos');
Route::delete('/listadoPartidos/{id}','ListadoPartidosController@borrarPartido');

//Editar un partido 
Route::get('/edit/{id}','ListadoPartidosController@editarPartido');
Route::post('/edit/{id}','ListadoPartidosController@update')->name('update');
//Eliminar un jugador
Route::delete('/edit/jugador/{id}','ListadoPartidosController@borrarJugador');

//Mostrar sin iniciar sesion todos los partidos públicos
Route::get('/partidosPublicos','InicioController@index');

//EDITAR LA CONFIGURACIÓN DE UN USUARIO
Route::get('/editarPerfil','PerfilUsuarioController@index')->name('perfil');;
Route::post('/editarPerfil/{id}','PerfilUsuarioController@editarPerfil');

//Buscar usuario
Route::post('/buscarUsuario','BusquedaController@buscarUsuario')->name('buscarUsuario');

//Iniciar Sesion con Red Social
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

