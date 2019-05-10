<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;	

class SocialController extends Controller
{
      public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->user();
        Auth::login($user);
       	return ($user);
    }
}
