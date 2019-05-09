<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller{

    protected function editProfile($id){

        $user = User::findOrFail($id);

        return view('edit',compact('user'));
    }

    protected function showPublicProfile($id){

        $user = user::findOrFail($id);

        $tasks = Task::where('owner_id',$id)->where('privacy','Public')->get(['id','name','desc','privacy','genre','owner_id']);
        
        
        if($id == Auth::user()->id){
            $tasks = Task::where('owner_id',$id)->get(['id','name','desc','privacy','genre','owner_id']);
        }
        
        return view('/profile',compact('user','tasks'));
    
    }

    protected function searchByEmail(){

        $user = User::where('email',request('email'))->get()->first();

        if($user==null){
            abort(404,'Not found');
        }

        $tasks = Task::where('owner_id',$user->id)->where('privacy','Public')->get();

        if(Auth::check()){
            if($user->id == Auth::user()->id){
                $tasks = Task::where('owner_id',$user->id)->get();
            }
        }

        return view('/profile',compact('user','tasks'));
    }
}
