
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
Route::get('/', 'HomeController@index')->name('home');

/** Ruta para crear una lista */
Route::get('usuarios/nuevo', 'ListController@create')->name('users.create');
Route::post('usuarios/crear','ListController@store');
Route::get('usuarios/nuevoItem','ListController@createItem')->name('users.createItem');
Route::post('usuarios/crearItem','ListController@storeItem');
/** */
// Route::get('usuarios/{user}/editar', 'UserController@edit')->name('users.edit');
/**GET/usuarios/{id} pagina detalles.
 * PUT/usuarios/{id} accion para actualizar.
 */
// Route::get('/usuarios/{user}', 'UserController@show')->name('users.show');


Route::get('usuarios/mostrarListas','ListController@showListas')->name('users.showListas');

Route::get('usuarios/mostrarListas/{list_id}/destroy','ListController@destroy')->name('users.destroy');

Route::get('usuarios/mostrarListas/{id}','ListController@updateLista')->name('users.updateLista');

Route::get('usuarios/mostrarListas/{id}/editar','ListController@editLista')->name('users.editLista');

Route::get('usuarios/mostrarListas/{id}/editarItem','ListController@editItem')->name('users.editItem');







// Route::put('/usuarios/{user}', 'UserController@update');
/**Ruta hacia los detalles del usuario para configurar sus vistas
 * Para eso la enlazo con el controlador User Controller y la funcion es show
*/



// Route::delete('/usuarios/{user}', 'UserController@destroy')->name('users.destroy');
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::resetPassword();
// Email Verification Routes...
Route::emailVerification();
Route::get('/home', 'HomeController@index')->name('home');
