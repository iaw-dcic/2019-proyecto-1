<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $playlists = Playlist::all();

        $playlists = $playlists->where('visibility',"Publica");

        $user = Auth::user();
        $user = User::find($user->id);

        $genreUser = $user->prefered_genre;

        $songs = array();
        $songsAlt = array();

        foreach($playlists as $playlist){

            $songsAux = $playlist->songs()->get();

            foreach($songsAux as $song){

                if($song->genre == $genreUser)
                    $songs[] = $song;
                else
                    $songsAlt[] = $songs;

            }
        }

        // Con los arreglos de song de genero preferido estaria bueno hacer
        // una seccion "Recomendado para Ti "

        if(count($playlists)>6)
            $playlists = $playlists->random(6);


        return view('index')->with('playlists',$playlists);
    }



}
