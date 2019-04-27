<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Playlist;

class PageController extends Controller
{
    public function index()
    {
        $playlists  = Playlist::all()->where('public');
        return view('welcome',compact('playlists'));
    }

    public function users()
    {
        $users = User::all();

        return view('users',compact('users'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
    public function settings()
    {
        return view('settings');
    }
}
