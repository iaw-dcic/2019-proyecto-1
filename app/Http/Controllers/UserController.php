<?php

namespace Cinefilo\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit() {
    	$user = auth()->user();
    	if ($user==null)
    		return view('auth.login');

    	return view('user.editprofile');
    }

    public function update() {
    	$user = auth()->user();

    	$user->name = request('name');
    	$user->gender = request('gender');
    	$user->about = request('about');

    	$user->save();

    	return view('user.editprofile');
    }

    public function changePassword() {
        return view('user.changepassword');
    }

    public function updatePassword() {
        dd(request('pass'));
        $user = $auth()->user();

        if ($user == null)
            return view('auth.login');

        $user->password = request('pass');
        $user->save();

        return redirect('/');
    }
}
