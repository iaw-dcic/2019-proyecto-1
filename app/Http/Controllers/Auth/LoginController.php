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
        dd($auth_user);
        
        $user = User::updateOrCreate(
            [
                'email' => $auth_user->email
            ],
            [
                'token' => $auth_user->token,
            ]
        );

        if ($user->name == null)
            $user->name = $auth_user->name;

        Auth::login($user, true);

        if ($user->password == null)
            return view('user.changepassword');
        
        return redirect('/');
    }
}