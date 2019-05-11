<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class SongController extends Controller
{


    public function onCreate($idLista){

        $userId = Auth::id();

        $playlist = Playlist::find($idLista);

        if($playlist->user_id != $userId){
            $message = "Oops parece que no tienes permisos para llegar aqui.";
            return view('auth.error')->with('message',$message);
        }

        $albums = DB::select('select distinct album from songs');
        $artists = DB::select('select distinct artist from songs');

        $playlist = Playlist::where('id',$idLista)->get()->first();

        return view('song.create')->with('playlist' , $playlist)->with('albums',$albums)->with('artists',$artists);
    }

    public function store(Request $request)
    {
        $song = new Song();

        $song->name=$request->get('nombre');
        $song->artist=$request->get('artista');
        $song->album=$request->get('album');
        $song->year=$request->get('year');
        $song->genre=$request->get('genero');
        $song->playlist_id=$request->get('playlist_id');

        $song->save();

        if($request->hasFile('imagen-0')){
            $file = $request->file('imagen-0');
            $image = $song->id . '_img.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/songs/';
            $file->move($path, $image);
            $song->image = $image;
            $song->save();
        }

        $message = "Cancion creada con exito!";
        $url = '/song/create/'.$song->playlist_id;
        $action = "Agregar más canciones";
        $playlistUrl = '/playlist/details/'.$song->playlist_id;

        $result = view('song.result-message')
            ->with('message',$message)
            ->with('url',$url)
            ->with('playlistUrl',$playlistUrl)
            ->with('action',$action)
            ->render();

        return response()->json(array('success' => true, 'html' => $result));

    }

    public function details($id) {

        $song = Song::find($id);

        $userId = Auth::id();
        $playlist = Playlist::find($song->playlist_id);

        if($playlist->visibility != 'Publica'){
            if($playlist->user_id != $userId){
                $message = "No esta permitido ver canciones de otros usuarios";
                return view('auth.error')->with('message',$message);
            }
        }

        return view('song.details')->with('song', $song);
    }

    public function delete($id){

        $userId = Auth::id();

        $song = Song::find($id);
        $playlist = Playlist::find($song->playlist_id);

        if($playlist->user_id != $userId){
            $message = "No esta permitido eliminar canciones de otros usuarios.";
            return view('auth.error')->with('message',$message);
        }

        $song = Song::find($id);
        $song->delete();
    }

}
