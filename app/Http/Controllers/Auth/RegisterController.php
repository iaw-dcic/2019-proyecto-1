<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function register(Request $request){
        $this->validator($request);
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    public function getViewRegister(Request $request){
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request){
        return $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){
        $user = new User();
        $user->username = $data['username'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        return $user;
    }

    //Consulta Ajax para veritifcar que el nombre de usuario está registrado o no.
    public function verifyUsername(Request $request){
        if($request->ajax()){
            $username = $request->input('val_input');
            $user = User::where('username', $username)->get()->first();
            if($user != null){
                return response()->json([
                    'exists' => true,
                    'message' => 'El usuario ya está registrado'
                ]);
            }else{
                return response()->json([
                    'exists' => false,
                    'message' => 'El usuario está disponible'
                ]);
            }
        }
    }

    //Consulta Ajax para saber si el email está registrado o no
    public function verifyEmail(Request $request){
        if($request->ajax()){
            $email = $request->input('val_input');
            $user = User::where('email', $email)->get()->first();
            if($user != null){
                return response()->json([
                    'exists' => true,
                    'message' => 'El email ya está registrado'
                ]);
            }else{
                return response()->json([
                    'exists' => false,
                    'message' => 'El email está disponible'
                ]);
            }
        }
    }
}
