<?php

namespace Haiku\Http\Controllers;

use Illuminate\Http\Request;
use Haiku\User;
use Haiku\Album ;
use Auth;
use Image;


class ApiController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        $users = User::all();
        return view('welcome',['users'=>$users,'albums'=>$albums]);
    }

    public function profile(){
        return view('profile',['user'=>Auth::user()]);

    }

    public function updateAvatar(Request $request){
        //Handle the user upload to avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $fileName = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('upload/avatars/' . $fileName);
            Image::make($avatar)->resize(300,300)->save(public_path().'/uploads/avatars/'.$fileName);
            $user  = Auth::user();
            $user->avatar = $fileName;
            $user->save();   
            return redirect('/home');    


        }


    }
}

