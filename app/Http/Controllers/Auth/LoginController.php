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

   public function redirectToProvider()
   {
        return Socialite::driver('github')->redirect();
   }

   public function handleProviderCallback($provider)
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



   public function findOrCreateUser($providerUser, $provider)
   {
       $account = SocialIdentity::whereProviderName($provider)
                  ->whereProviderId($providerUser->getId())
                  ->first();

       if ($account) {
           return $account->user;
       } else {
           $user = User::whereEmail($providerUser->getEmail())->first();

           if (! $user) {
               $user = User::create([
                   'email' => $providerUser->getEmail(),
                   'nick_name'  => $providerUser->getName(),
               ]);
           }

           $user->identities()->create([
               'provider_id'   => $providerUser->getId(),
               'provider_name' => $provider,
           ]);

           return $user;
       }
   }

   public function redirectToFacebookProvider()
{
    return Socialite::driver('facebook')->redirect();
}

/**
 * Obtiene la información de Facebook
 *
 * @return \Illuminate\Http\RedirectResponse
 */
public function handleProviderFacebookCallback()
{
    $auth_user = Socialite::driver('facebook')->user(); 
    dd($auth_user);
}
}
