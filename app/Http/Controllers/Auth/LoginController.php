<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;//esti
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

    /** clase usada por socialite
     * redirect (): se encarga de enviar al usuario al proveedor de OAuth
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * 
     * user () : leerá la solicitud entrante y recuperará la información del usuario del proveedor.
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
       
      $user = Socialite::driver('github')->user();
        
       $createUser = User::FirstOrCreate(
        [
            'email' => $user->getEmail()
        ],
        [
            'name' => $user->getName()
       
         ]);
        auth()->login($createUser);
          return redirect('/home');
        
       

       
    }

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
}
