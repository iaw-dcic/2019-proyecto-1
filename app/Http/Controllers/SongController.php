<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SongController extends Controller
{


    public function onCreate($idLista){

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

    }

    public function details($id) {

        $song = Song::find($id);

        return view('song.details')->with('song', $song);
    }

    public function delete($id){
        $song = Song::find($id);
        $song->delete();
    }

}
