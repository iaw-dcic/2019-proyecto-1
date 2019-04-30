<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;
use File;

class UserController extends Controller
{
    public function index($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		return view('profile.show', compact('user'));
	}

	public function edit($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		if($user->id == Auth::user()->id){
			return view('profile.edit', compact('user'));
		}
		else{
			abort('403', 'Unauthorized access');
		}
	}

	public function update($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		if(request('username') != $user->username){
			$uname = request()->validate(['username' => ['required', 'unique:users,username']]);
			$user->update($uname);
		}
		if(request('image') != null){
			$image = request()->validate(['image' => [ 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048']]);
			$extension = request()->image->getClientOriginalExtension();
			if($user->image != 'default-user.png'){
				File::delete(asset('storage/images/'.$user->image));
			}
			$imageName = $user->id.'_image'.time().'.'.$extension;
			request()->image->storeAs('images',$imageName);
			$user->image = $imageName;
			$user->save();
		}
		$user->nickname = request('nickname') != null ? request('nickname') : '';
		$user->bio = request('bio') != null ? request('bio') : '';
		$user->save();
		return redirect('/profile/'.$user->username);
	}
}
