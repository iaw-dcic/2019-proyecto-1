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

        $list = Lista::where('id', $song->lista_id)->get();

        abort_if(auth()->id() != $list[0]->user_id, 403);

    	return view('song.show', compact('song'));
    
    }

    public function create(Lista $list){

        abort_if(auth()->id() != $list->user_id, 403);

    	return view('song.create', compact('list'));

    }

    public function store(Lista $list){

        request()->validate([
            'title' => ['required', 'max:255'],
            'album' => ['required', 'max:255'],
            'band' => ['required', 'max:255']
        ]);

    	$cancion = new Song;

    	$cancion->title = request('title');
    	$cancion->album = request('album');
    	$cancion->band = request('band');
    	$cancion->lista_id = $list->id;

    	$cancion->save();

    	return redirect('/lists/'.$list->id);
    }

    public function destroy(Song $song){
        $id = $song->lista_id;
        $song->delete();

        return redirect('/lists/'.$id);
    }

    public function edit(Song $song){

        $list = Lista::where('id', $song->lista_id)->get();

        abort_if(auth()->id() != $list[0]->user_id, 403);

        return view('song.edit', compact('song'));
    }

    public function update(Song $song){
        
        request()->validate([
            'title' => ['required', 'max:255'],
            'album' => ['required', 'max:255'],
            'band' => ['required', 'max:255']
        ]);

        $song->title = request('title');
        $song->album = request('album');
        $song->band = request('band');
        $song->save();
        return redirect('/lists/'.$song->lista_id);
        
    }
}
