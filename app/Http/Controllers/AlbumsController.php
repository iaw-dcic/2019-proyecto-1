<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $album = Album::all();

        return view('albums.indexAlbum',compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('albums.createAlbum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request) {
        Album::create(request()->validate([
            'list_name' => 'required',
            'public' => 'required',
            'owner' => 'required',
        ]));

        return redirect('/albums');
    }*/

    public function store()
    {
        $rules = array(
            'list_name' => 'required',
            'public' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('albums/createAlbum')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            // store
            $album = new Album;
            $album->list_name = Input::get('list_name');
            $album->public = Input::get('public');
            $album->owner = Auth::user()->name;
            $album->save();

            Session::flash('message', 'Successfully created!');
            return redirect('/albums');
            //return Redirect::to('albums');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album) {
        return view('albums.showAlbum', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album) {
        return view('albums.editAlbum', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album) {
        $album->update(request(['list_name', 'public']));

        return redirect('/albums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album) {
        $album->delete;

        return redirect('/albums');
    }
}