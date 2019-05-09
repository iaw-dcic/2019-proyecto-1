<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    //Obtener la vista de login
    public function getViewLogin(){
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
            return response()->json([
                'exists' => ($user != null)
            ]);
        }
        abort(400, '400 Bad Request');
    }

    //Conexión con las redes sociales
    public function redirectToProvider($driver){
        return Socialite::driver($driver)->redirect();
    }

    //Callback para las redes sociales
    public function handleProviderCallback($driver){
        try{
            $user = Socialite::driver($driver)->user();
            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser)
                auth()->login($existingUser, true);
            else {
                $newUser = $this->crearUsuario($user, $driver);
                if($newUser != null)
                    auth()->login($newUser, true);
                else
                    return redirect()->route('login');
            }

        }catch(\Exception $e){
            return redirect()->route('login');
        }
        return redirect($this->redirectPath());
    }

    private function crearUsuario($user, $driver){
        DB::beginTransaction();
        try{
            $newUser = new User();
            $newUser->provider_name = $driver;
            $newUser->provider_id = $user->getId();
            $newUser->name = $user->getName();
            $username = str_replace(' ', '', $user->getName());
            $newUser->username = strtolower($username);
            $newUser->email = $user->getEmail();
            $newUser->email_verified_at = now();

            Cloudder::upload($user->getAvatar());
            $result = Cloudder::getResult();
            $photo_id = $result['public_id'];
            $photo_url = $result['secure_url'];

            $newUser->photo_id = $photo_id;
            $newUser->photo_url = $photo_url;
            $newUser->save();
            DB::commit();
            return $newUser;
        }catch(\Exception $ex){
            DB::rollback();
            abort(500, '500 Internal Server Error');
        }
        return null;
    }
}
