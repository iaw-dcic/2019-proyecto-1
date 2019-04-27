<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lista;

class ProfileController extends Controller
{
    //
    public function viewprofile($username)
    {
        $user = User::where('username', '=', $username)->get(['username', 'avatar','description','id'])->first();
        $listas = Lista::where('user_id',$user->id)->where('visibility', true)->get(['id', 'listname','likes','views']);
        return view('profile/profile', ['user' => $user,'listas' => $listas]);
    }
}
