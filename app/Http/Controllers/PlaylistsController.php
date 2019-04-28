<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use App\User;

class PlaylistsController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //obtengo el user y su playlist
        $user = User::find($request->user()->id);
        $playlists = Playlist::all()->where('user_id',$user->id);

        //las paso a la vista user y playlists
        return view('playlists.index',compact('user','playlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valido la entrada
        $datos = $request->validate([
            'name' => 'required|string|unique:users|max:255',
            'description' => 'string',
        ]);

        //Creo nueva playlist
        $nuevaPlaylist = new Playlist;
        $nuevaPlaylist->name = $datos['name'];
        $nuevaPlaylist->description = $datos['description'];

        //Guardo en DB con user
        $request->user()->playlists()->save($nuevaPlaylist);

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //obtengo el user y su playlist
        $user = User::find($request->user()->id); //esto no es necesario
        $playlist = Playlist::find($request->playlist);

        return view('playlists.show',compact('user','playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
