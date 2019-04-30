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

            $tasks = Task::where('owner_id',auth()->id())->get(['id','cod','title','author','editorial','privacy','owner_id','owner_name']);
            
            return view('/profile',compact('user','tasks'));
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

        $tasks = Task::where('owner_id',$id)->where('privacy','Public')->get(['id','cod','title','author','editorial','privacy','owner_id','owner_name']);
        
        if($id == auth()->id()){
            $tasks = Task::where('owner_id',$id)->get(['cod','title','author','editorial']);
        }
        
        return view('profile',compact('user','tasks'));
    
    }
}
