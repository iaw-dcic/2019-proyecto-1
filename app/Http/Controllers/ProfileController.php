<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller{

    protected function showProfile(){

        if(Auth::check()){
            $user = User::where('id',auth()->id())->get()[0];
            return view('/profile',compact('user'));
        }
        else{
            return view('/profile');
        }
    }

    protected function editProfile($id){ //faltan cosas acá

        $user = User::find($id);

        return view('edit');
    }

    protected function showPublicProfile($id){

        $user = user::findOrFail($id);
        return view('profile',compact('user'));
    
    }
}
