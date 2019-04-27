<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from Twitter
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->user();

        //If user is registered with social networks, its username will be the name in lowercase and without spaces
        $username = str_replace(' ', '', strtolower($user->getName()));

        $newUser = User::where('email', $user->getEmail())->first();

        if (!$newUser) {
            $newUser = new User;
            $newUser->email = $user->getEmail();
            $newUser->userName = $username;
            $newUser->name = $user->getName();
            $newUser->provider_id = $user->getId();
        }

        Auth::login($newUser, true);
        return redirect($this->redirectTo);
    }


    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {

        $messages = ["{$this->username()}.exists" => 'No existe ninguna cuenta con este email.'];

        $this->validate($request, [
            $this->username() => "required|exists:users",
            'password' => 'required',
        ], $messages);
    }
}
