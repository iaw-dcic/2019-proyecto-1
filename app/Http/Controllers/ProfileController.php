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
        if ($user == null) {
            abort(404);
        }
        $listas = Lista::where('user_id',$user->id)->where('visibility', true)->orderBy('created_at', 'desc')->get(['id', 'listname','likes','views']);
        return view('profile/profile', ['user' => $user,'listas' => $listas]);
    }
}
