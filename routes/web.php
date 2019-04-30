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

//Authentication Routes
Auth::routes();

Route::post('/user/register','Auth\RegisterController@register');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {

    // Playlist

    Route::get('playlists', 'PlaylistController@index');

    Route::get('playlist/create', function () {
        return view('playlist.create');
    });

    Route::get('playlist/details/{id}', [
        'uses'  => 'PlaylistController@details',
        'as'    => 'playlist.details'
    ]);

    Route::post('playlist/store','PlaylistController@store');

    Route::post('/playlist/visibility','PlaylistController@changeVisibility');

    Route::get('playlist/delete/{id}','PlaylistController@delete');

    // Song

    Route::get('song/create/{id}', [
        'uses'  => 'SongController@onCreate',
        'as'    => 'song.create'
    ]);

    Route::get('song/details/{id}', [
        'uses'  => 'SongController@details',
        'as'    => 'song.details'
    ]);

    Route::post('song/store','SongController@store');

    Route::get('song/delete/{id}','SongController@delete');

    // User

    Route::get('profile', 'UserController@index')->name('profile');

    Route::post('/user/update','UserController@update');

});

Route::get('search/playlist', 'AutoCompleteController@searchIndex');

Route::get('autocomplete/playlist', 'AutoCompleteController@searchPlaylist');

Route::get('autocomplete/artist', 'AutoCompleteController@searchArtist');

Route::get('autocomplete/album', 'AutoCompleteController@searchAlbum');

Route::get('autocomplete/songName', 'AutoCompleteController@searchSongName');