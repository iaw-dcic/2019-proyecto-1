<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Playlist;
use App\User;

class PlaylistVideosController extends Controller
{

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param
     * @return \Illuminate\Http\Response
     */
    public function store(User $user,Playlist $playlist, Request $request)
    {
        /*
        expresion regular para url de youtube o vimeo:
        /^https:\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|\/)?([a-z0-9_\-]+)/i'
        */

        //Valido la entrada
        $datos = $request->validate([
            'url' => ['required','url','regex:/^https:\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|\/)?([a-z0-9_\-]+)/i'],
            'title' => 'nullable|string',
            'category' => 'nullable|string'
        ]);


        //Obtengo el usuario logueado
        $user=auth()->user();

        //Creo nueva playlist
        $nuevoVideo = new Video;
        $nuevoVideo->url = $datos['url'];
        $nuevoVideo->title = $datos['title'];
        $nuevoVideo->category = $datos['category'];
        $nuevoVideo->playlist_id = $playlist->id;

        //Si el user puede modificar la playlist entonces puede agregar videos
        $this->authorize('update',$playlist);


        //Guardo video en DB con playlist
        $playlist->videos()->save($nuevoVideo);

        //Preparo variables para la redireccion
        $parametros=[
            'playlist' => $playlist->id,
            'user' => $user->id
        ];
        return redirect()->route('show_playlist',$parametros);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Playlist $playlist, Video $video)
    {
        //chequeo si el usuario es el dueño
        $this->authorize('update',$playlist);

        //elimino
        $video->delete();

        //Preparo variables para la redireccion
        $parametros=[
            'playlist' => $playlist->id,
            'user' => $user->id
        ];
        return redirect()->route('show_playlist',$parametros);
    }


}
