<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function getProfile(){
        
        $user = Auth::user();

        return view('Profile\profile',compact('user'));
    }

    public function getSettings(){
        
        $user = Auth::user();

        return view('Profile\settings',compact('user'));
    }

    public function updateUser(){

        $user = Auth::user();

        request()->validate([
            'name' => ['nullable','min:3','max:25'],
            'myAvatar' => ['nullable'], 
            'description' => ['nullable','min:3','max:500']  
        ]);

        if(request('name')!=null)
            $user->name = request('name');
        else
            if (request('myAvatar')!=null)
                dd(request('myAvatar'));
            else 
                $user->description = request('description');
        
        $user->save();

        return view('Profile\settings',compact('user'));
    }
}
