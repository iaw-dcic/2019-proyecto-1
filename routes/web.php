
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
Route::get('usuarios/nuevoItem/cancelar','ListController@cancelar')->name('users.cancelar');
Route::post('usuarios/crearItem','ListController@storeItem');
/** */
//
/**GET/usuarios/{id} pagina detalles.
 * PUT/usuarios/{id} accion para actualizar.
 */
Route::get('usuarios/show/{user}','UserController@show')->name('users.show');

Route::get('usuarios/{user}/editar', 'UserController@edit')->name('users.edit');
Route::get('usuarios/{user}/editar/viewKey','UserController@showViewKey')->name('users.viewKey');
Route::post('usuarios/{user}/editar/viewKey','UserController@storeKey');

Route::put('usuarios/{user}', 'UserController@update');

Route::get('usuarios/mostrarListas','ListController@showListas')->name('users.showListas');

Route::get('usuarios/mostrarListas/{list_id}/destroy','ListController@destroy')->name('users.destroy');

Route::get('usuarios/mostrarListas/{id}','ListController@updateLista')->name('users.updateLista');

Route::get('usuarios/mostrarListas/{id}/editar','ListController@editLista')->name('users.editLista');

Route::get('usuarios/mostrarListas/{id}/editItem','ListController@editItem')->name('users.editItem');
Route::get('usuarios/mostrarListas/{id}/guardar','ListController@updateEditItem')->name('users.updateEditItem');


Route::get('login/twofactor','Auth\LoginController@twofactor')->name('twofactor');
Route::post('login/twofactor','UserController@twofactorP');

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

?>
