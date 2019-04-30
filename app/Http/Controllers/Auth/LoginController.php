<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectToHome = '/';
    protected $redirectToLogin = '/login';
    protected $redirectToProfile = '/profile';


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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userGithub = Socialite::driver('github')->stateless()->user();

        $user = User::where('email',$userGithub->getEmail())->first();

        if(!$user){ // Si el usuario no existe

            $user = new User();

            $user->provider_id = $userGithub->getId();
            $user->email = $userGithub->getEmail();
            $user->name = $userGithub->getName();
            $user->username = $userGithub->getNickname();
            $user-> avatar_img = $userGithub->getAvatar();

            $user->save();
        }

        // Login User
        Auth::login($user,true);

        return redirect($this->redirectToHome);
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookCallback()
    {
        try {

            $userFacebook = Socialite::driver('facebook')->stateless()->user();

            $user = User::where('email',$userFacebook->getEmail())->first();

            list($username,$dominio) = explode("@", $userFacebook->getEmail());

            if(!$user){ // Si el usuario no existe

                $user = new User();

                $user->provider_id = $userFacebook->getId();
                $user->email = $userFacebook->getEmail();
                $user->username = $username;
                $user->name = $userFacebook->getName();
                $user-> avatar_img = $userFacebook->getAvatar();

                $user->save();
            }

            // Login User
            Auth::login($user,true);

            return redirect($this->redirectToHome);

        } catch (Exception $e) {

            return redirect('login/facebook');

        }
    }


}
