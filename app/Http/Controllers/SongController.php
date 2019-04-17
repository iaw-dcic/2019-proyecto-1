<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;

class SongController extends Controller
{
    public function show(Song $song){

    	return view('song.show', compact('song'));
    
    }
}
