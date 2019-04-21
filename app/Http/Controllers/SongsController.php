<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $song = Song::all();

        return view('songs.index',compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Song::create(
            request()->validate([
                'song_name' => 'required',
                'artist' => 'required',
                'album' => 'required',
                'release_year' => ['required', 'digits_between:1,2050']
            ])
        );

        return redirect('/songs');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song) {
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song) {

        return view('songs.edit', compact('songs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song) {
        $song->update(request(['song_name', 'artist', 'album', 'release_year', 'notes']));

        return redirect('/songs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song) {
        $song->delete;

        return redirect('/songs');
    }
}