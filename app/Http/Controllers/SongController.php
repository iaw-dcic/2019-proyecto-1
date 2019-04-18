<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;

use App\Lista;

class SongController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }

    public function show(Song $song){

    	return view('song.show', compact('song'));
    
    }

    public function create(Lista $list){
    	return view('song.create', compact('list'));
    }

    public function store(Lista $list){
    	$cancion = new Song;

    	$cancion->title = request('title');
    	$cancion->album = request('album');
    	$cancion->band = request('band');
    	$cancion->lista_id = $list->id;

    	$cancion->save();

    	return back();
    }

    public function destroy(Song $song){
        $id = $song->lista_id;
        $song->delete();

        return redirect('/lists/'.$id);
    }

    public function edit(Song $song){
        return view('song.edit', compact('song'));
    }

    public function update(Song $song){
        $song->title = request('title');
        $song->album = request('album');
        $song->band = request('band');
        $song->save();
        return redirect('/lists/'.$song->lista_id);
    }
}
