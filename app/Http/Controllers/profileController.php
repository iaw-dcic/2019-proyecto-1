<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Image;

use Illuminate\Http\Request;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProfile(){
        
        $user = Auth::user();

        return view('Profile/profile',compact('user'));
    }

    public function getSettings(){
        
        $user = Auth::user();

        return view('Profile/settings',compact('user'));
    }

    public function updateUser(){

        $user = Auth::user();

        request()->validate([
            'name' => ['nullable','min:3','max:25'],
            'description' => ['nullable','min:3','max:500']  
        ]);

        if(request('name')!=null)
            $user->name = request('name');
        else
             $user->description = request('description');
          
        $user->save();

        return view('Profile/settings',compact('user'));
    }

    public function update_avatar(Request $request){ 

        $user = Auth::user();
        if($request->hasFile('myAvatar')){
            $avatar = $request->file('myAvatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/Users/' . $filename));
        
            $user->avatar = $filename;
            $user->save();
        }

        return view('Profile/settings',compact('user'));
    }
}
