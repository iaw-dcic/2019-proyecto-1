<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index(){

        $user = Auth::user();

        $playlists = Playlist::where('user_id',$user->id)->get();

        return view('playlist.index')->with('playlists', $playlists);
    }

    public function details($id) {

        $songs = Song::where('playlist_id',$id)->get();

        $playlist = Playlist::find($id);

        // Controles de seguridad.
        $userId = Auth::id();

        if($playlist->user_id != $userId){
            $message = "No esta permitido ver playlists de otros usuarios";
            return view('auth.error')->with('message',$message);
        }

        return view('playlist.details')->with('songs', $songs)->with('playlist',$playlist);
    }

    public function store(Request $request)
    {

        if($request->get('id')!= -1){
            $playlist = Playlist::find($request->get('id'));
        }
        else
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

        $message = "Playlist creada con exito!";
        $url = '/playlist/create';
        $action = "Crear nueva Playlist";

        $result = view('playlist.result-message')
            ->with('message',$message)
            ->with('url',$url)
            ->with('action',$action)
            ->render();

        return response()->json(array('success' => true, 'html' => $result));

    }

    public function update($id){

        $playlist = Playlist::find($id);

        // Controles de seguridad.
        $userId = Auth::id();

        if($playlist->user_id != $userId){
            $message = "No esta permitido ver playlists de otros usuarios";
            return view('auth.error')->with('message',$message);
        }

        return view('playlist.create')->with('playlist',$playlist);
    }

    public function delete($id){

        $userId = Auth::user()->id;

        if($id != $userId){
            $message = "No esta permitido modificar playlists de otros usuarios";
            return view('auth.error')->with('message',$message);
        }

        $playlist = Playlist::find($id);
        $playlist->delete();

    }

    public function changeVisibility(Request $request){


        $userId = Auth::user()->id;

        if($request->id != $userId){
            $message = "No esta permitido modificar playlists de otros usuarios";
            return view('auth.error')->with('message',$message);
        }

        $playlist = Playlist::find($request->get('id'));

        $playlist->visibility = $request->get('visibility');
        $playlist->save();
    }

}
