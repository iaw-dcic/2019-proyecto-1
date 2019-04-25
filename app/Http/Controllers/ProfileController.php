<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    //
    public function viewprofile($username)
    {
        //dd($username);
        $user = User::where('username', '=', $username)->get(['username', 'avatar']);
        return view('profile/profile', ['user' => $user->first()]);
    }
}
