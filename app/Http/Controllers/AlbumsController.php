<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use Redirect;

class AlbumsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        $album = Album::select('*')->where('owner', Auth::user()->name)->get();

        return view('albums.indexAlbum', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create () {
        $this->middleware('auth');

        if (Auth::user()) {
            return view('albums.createAlbum');
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
    public function store () {
        $this->middleware('auth');

        $attributes = array(
            'list_name' => 'required',
            'public' => 'required'
        );
        $validator = Validator::make(Input::all(), $attributes);

        if ($validator->fails()) {
            return Redirect::to('albums.createAlbum')->withErrors($validator)->withInput(Input::except('password'));
        }
        else {
            $album = new Album;
            $album->list_name = Input::get('list_name');
            $album->public = Input::get('public');
            $album->owner = Auth::user()->name;
            $album->save();

            return Redirect::to('albums');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show (Album $album) {
        if ($album->public == 0) {

            if (!Auth::user()) {
                return Redirect::to('/login');
            }
            else {
                if (Auth::user() != $album->owner) {
                    abort(403, 'Unauthorized Action');
                }
            }
            
        }
        return view('albums.showAlbum', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit (Album $album) {
        $this->middleware('auth');

        if (Auth::user()) {
            if ((Auth::user()->name) == ($album->owner)) {
                return view('albums.editAlbum', compact('album'));
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
    public function update (Request $request, Album $album) {
        $this->middleware('auth');

        $album->update(request(['list_name', 'public']));

        return redirect('/albums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy (Album $album) {
        $this->middleware('auth');

        $album->delete();

        return redirect('/albums');
    }
}