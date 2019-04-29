<?php

namespace Cinefilo\Http\Controllers\Auth;

use Cinefilo\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use \Cinefilo\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToFacebookProvider() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderFacebookCallback() {
        $auth_user = Socialite::driver('facebook')->user();

        $user = User::where('email', $auth_user->email);

        if ($user==null) {
            $user = new User();
            $user->name = $auth_user->name;
            $user->email = $auth_user->email;
            $user->token = $auth_user->token;
            $user->save();
        } else
            $user->token = $auth_user->token;
        
        /*$user = User::updateOrCreate(
            [
                'email' => $auth_user->email
            ],
            [
                'token' => $auth_user->token,
            ]
        );*/


        dd($auth_user);

        Auth::login($user, true);

        if ($user->password == null)
            return view('user.changepassword');
        
        return redirect('/');
    }
}