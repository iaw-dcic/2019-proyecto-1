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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        $song = Song::all();

        return view('songs.indexSong',compact('song'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create (Album $album) {
        return view('songs.createSong', ['album'=>$album]);
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

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show (Song $song) {
        return view('songs.showSong', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (Album $album, Song $song) {
        return view('songs.editSong', compact('album', 'song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, Song $song) {
        $song->update(request(['song_name', 'artist', 'album', 'release_year', 'notes']));

        return redirect('/songs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy (Song $song) {
        $song->delete();

        return redirect('/songs');
    }
}