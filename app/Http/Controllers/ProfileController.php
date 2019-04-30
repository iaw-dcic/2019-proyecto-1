<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Task;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller{

    protected function showProfile(){

        if(Auth::check()){
            $user = User::where('id',auth()->id())->get()[0];
            return view('/profile',compact('user'));
        }
        else{
            return redirect('/');
        }
    }

    protected function editProfile($id){

        $user = User::findOrFail($id);

        return view('edit',compact('user'));
    }

    protected function showPublicProfile($id){

        $user = user::findOrFail($id);

        
        return view('profile',compact('user'));
    
    }
}
