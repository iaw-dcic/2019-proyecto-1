<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;

use App\Lista;

class SongController extends Controller
{
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
}
