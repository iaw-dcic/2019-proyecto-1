<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){

        $user = Auth::user();

        $playlists = Playlist::where('user_id',$user->id)->get();

        $songs = array();

        foreach($playlists as $playlist){
            $songs = $playlist->songs()->get();
        }

        return view('user.profile')->with('user' , $user)->with('playlists',$playlists)->with('songs',$songs);
    }

    public function update(Request $request)
    {

        $user = Auth::user();

        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->birthday = $request->get('birthday');
        $user->prefered_genre = $request->get('prefered_genre');
        $user->gender = $request->get('gender');
        $user->email = $request->get('email');

        if($request->hasFile('imagen-0')){
            $file = $request->file('imagen-0');
            $image = $user->id . '_img.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/users/';
            $file->move($path, $image);
            $user->avatar_img = $image;
            $user->save();
        }

        $user->save();

    }

}
