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
        $user = Auth::user();
        if(!$user)
        return redirect()->route('home');
        $albums= User::find($user->id)->albums;
        return view('profile',['user'=>$user,'albums'=>$albums]);

    }

    public function showUser($id){
       
       
        $user = User::find($id);
        $albums= User::find($id)->albums->where('public', 1);

        //dd($albums);
        return view('users/showUser',['user'=>$user,'albums'=>$albums]);

      
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

    public function updateUser(){
        $user = Auth::user();
        if(!$user)
        return redirect()->route('home');
        return view('users/editUser',['user'=>$user]);



    }

    public function updatePost(Request $request){
        $user = Auth::user();
        //dd($request);
        if(!$user)
        return redirect()->route('home');

        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $fileName = time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('upload/avatars/' . $fileName);
            Image::make($avatar)->resize(300,300)->save(public_path().'/uploads/avatars/'.$fileName);
            $user->avatar = $fileName; 

        }

        $user->name = $data['name'];
        $user->email = $data['email'];

        $user->save();
        $albums= User::find($user->id)->albums;
        return view('profile',['user'=>$user,'albums'=>$albums]);

    }

    public function about(){
        return view('about');

    }
}

