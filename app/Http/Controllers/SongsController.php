<?php

namespace App\Http\Controllers;

use App\Song;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Redirect;

class SongsController extends Controller {
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create (Album $album) {
        if (Auth::user()) {
            if ((Auth::user()->name) == ($album->owner)) {
                return view('songs.createSong', ['album'=>$album]);
            }

            else {
                abort(403, 'Unauthorized Action');
            }
        }

        else {
            return Redirect::to('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Album $album) {
        $attributes = array(
            'song_name' => 'required',
            'artist' => 'required',
            'album' => 'required',
            'release_year' => ['required', 'digits_between:1,2050'],
            'notes' => 'nullable'
        );
        $validator = Validator::make(Input::all(), $attributes);

        if ($validator->fails()) {
            return Redirect::to('songs.createSong')->withErrors($validator)->withInput(Input::except('password'));
        }

        else {
            $song = new Song;
            $song->song_name = Input::get('song_name');
            $song->artist = Input::get('artist');
            $song->album = Input::get('album');
            $song->release_year = Input::get('release_year');
            $song->notes = Input::get('notes');
            $song->list_id = $album->list_id;
            $song->save();

            return view('albums.showAlbum', compact('album'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (Album $album, Song $song) {
        if (Auth::user()) {
            if ((Auth::user()->name) == ($album->owner)) {
                return view('songs.editSong', compact('album', 'song'));
            }

            else {
                abort(403, 'Unauthorized Action');
            }
        }

        else {
            return Redirect::to('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, Album $album, Song $song) {
        $song->update(request(['song_name', 'artist', 'album', 'release_year', 'notes']));

        return view('albums.showAlbum', compact('album'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy (Album $album, Song $song) {
        $song->delete();

        return view('albums.showAlbum', compact('album'));
    }
}