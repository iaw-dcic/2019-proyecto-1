<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
Use App\User;
use App\SocialIdentity;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   public function redirectToFacebookProvider()
{
    return Socialite::driver('facebook')->redirect();
}

public function handleProviderFacebookCallback()
{
    $auth_user = Socialite::driver('facebook')->user();
    
    $user = User::where('email', $auth_user->email)
                    ->first();
    if ($user==null) {
        $user = new User();
        $user->nick_name = $auth_user->name;
        $user->email = $auth_user->email;
        $user->token = $auth_user->token;
        $user->save();
    } else
        $user->token = $auth_user->token;
    Auth::login($user, true);
       
    return redirect('/users');
    }
}
