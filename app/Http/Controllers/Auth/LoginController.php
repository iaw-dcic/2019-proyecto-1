<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class LoginController extends Controller{
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
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function getViewLogin(Request $request){
        return view('auth.login');
    }

    //Consulta ajax para verificar si el usuario con el password existen
    public function verifyEmailAndPassword(Request $request){
        return $request;
        if($request->ajax()){
            $email = $request->input('email');
            $password = $request->input('password');
            $password = Hash::make($password);
            $user = User::where(['email' => $email, 'password' => $password])->get()->first();
            if($user != null)
                return response()->json([
                    'exists' => true
                ]);
            else
                return response()->json([
                    'exists' => false
                ]);
        }else{
            return reponse()->json([
                'exists' => false
            ]);
        }
    }

    //Redirect to provider
    public function redirectToProvider($driver){
        return Socialite::driver($driver)
        ->with(
            ['client_id' => env('GOOGLE_CLIENT_ID')],
            ['client_secret' => env('GOOGLE_CLIENT_SECRET')],
            ['redirect' => 'http://protolog.herokuapp.com/login/google/callback'])
        ->redirect();
    }

    //Callback
    public function handleProviderCallback($driver){
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser = new User();
            $newUser->provider_name = $driver;
            $newUser->provider_id = $user->getId();
            $newUser->name = $user->getName();
            $newUser->username = strtolower(trim($user->getName(), " "));
            $newUser->email = $user->getEmail();
            $newUser->email_verified_at = now();
            $file = file($user->getAvatar());
            file_put_contents(public_path('storage\\users\\').$user->getId().$driver.'.jpg', $file);
            $newUser->photo = $user->getId().$driver.'.jpg';
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect($this->redirectPath());
    }
}
