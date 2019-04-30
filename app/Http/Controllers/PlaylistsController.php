<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use App\User;

class PlaylistsController extends Controller
{
    public function __construct(){

        $this->middleware('auth');//->except([]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user,Request $request)
    {
        //obtengo las playlists del user
        $playlists = Playlist::all()
            ->where('user_id',$user->id)
            ->where('public',true);

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
    public function store(User $user,Request $request)
    {
        //Valido la entrada
        $datos = $request->validate([
            'name' => 'required|string|unique:users|min:3|max:255',
            'description' => 'string',
        ]);

        //Obtengo el usuario logueado
        $user=auth()->user();

        //Creo nueva playlist
        $nuevaPlaylist = new Playlist;
        $nuevaPlaylist->name = $datos['name'];
        $nuevaPlaylist->description = $datos['description'];
        $nuevaPlaylist->user_id = $user->id;

        $this->authorize('update',$nuevaPlaylist);

        //Guardo en DB con user
        $user->playlists()->save($nuevaPlaylist);

        //Preparo variables para la redireccion
        $parametros=[
            'playlist' => $nuevaPlaylist->id,
            'user' => $user->id
        ];
        return redirect()->route('show_playlist',$parametros);
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,Playlist $playlist)
    {
        $this->authorize('view',$playlist);

        return view('playlists.show',compact('user','playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Playlist $playlist)
    {
        $this->authorize('update',$playlist);

        return view('playlists.edit',compact('user','playlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Playlist $playlist, Request $request)
    {
        //Chequeo que el usuario este autorizado para editar
        $this->authorize('update',$playlist);

        //Valido la entrada
        $datos = $request->validate([
            'name' => 'required|string|unique:users|min:3|max:255',
            'description' => 'string',
        ]);

        //Asigno las modificaciones
        $playlist->name = $datos['name'];
        $playlist->description = $datos['description'];

        //Actualizo con ediciones
        $playlist->update();

        //Preparo variables para la redireccion
        $parametros=[
            'playlist' => $playlist->id,
            'user' => $user->id
        ];
        return redirect()->route('show_playlist',$parametros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function publish(User $user,Playlist $playlist, Request $request)
    {
        //Chequeo que el usuario este autorizado para publicar
        $this->authorize('update',$playlist);

        //Asigno que la playlists ahora es publica
        $playlist->public = true;

        //Actualizo con ediciones
        $playlist->update();

        //Preparo variables para la redireccion
        $parametros=[
            'playlist' => $playlist->id,
            'user' => $user->id
        ];
        return redirect()->route('show_playlist',$parametros);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hide(User $user,Playlist $playlist, Request $request)
    {
        //Chequeo que el usuario este autorizado para ocultar
        $this->authorize('update',$playlist);

        //Asigno que la playlists ahora es publica
        $playlist->public = false;

        //Actualizo con ediciones
        $playlist->update();

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
    public function destroy($id)
    {
        //obtengo playlist
        $playlist=Playlist::find($id);

        //chequeo si el usuario es el dueño
        $this->authorize('update',$playlist);

        //elimino
        $playlist->delete();

        return redirect('home');
    }
}
