<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;

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

        if(count($playlists)>6)
            $playlists = $playlists->random(6);

        return view('index')->with('playlists',$playlists);
    }



}
