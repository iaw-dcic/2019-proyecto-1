<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index(){

        $userId = Auth::id();

        $playlists = Playlist::where('user_id',$userId)->get();

        return view('playlist.index')->with('playlists', $playlists);

    }

    public function details($id) {

        $songs = Song::where('playlist_id',$id)->get();

        $playlist = Playlist::where('id',$id)->first();

        return view('playlist.details')->with('songs', $songs)->with('playlist',$playlist);
    }

    public function store(Request $request)
    {
        $playlist = new Playlist();

        $playlist->name=$request->get('nombre');
        $playlist->spotify_url=$request->get('spotify_url');
        $playlist->visibility=$request->get('visibilidad');

        $playlist->user_id = Auth::id();

        $playlist->save();

        if($request->hasFile('imagen-0')){
            $file = $request->file('imagen-0');
            $image = $playlist->id . '_img.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/playlists/';
            $file->move($path, $image);
            $playlist->image = $image;
            $playlist->save();
        }

    }

    public function delete($id){
        $playlist = Playlist::find($id);
        $playlist->delete();
    }

    public function changeVisibility(Request $request){

        $playlist = Playlist::find($request->get('id'));

        $playlist->visibility = $request->get('visibility');
        $playlist->save();
    }

}
