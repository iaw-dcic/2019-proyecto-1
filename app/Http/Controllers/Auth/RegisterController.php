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
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct(){
        $this->middleware('guest');
    }

    //Obtiene la vista de registro
    public function getViewRegister(){
        return view('auth.register');
    }

    //Registra un nuevo usuario
    public function register(Request $request){
        $this->validator($request);
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
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
        $username = str_replace(' ', '', $data['username']);
        $user->username = strtolower($username);
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
            return response()->json([
                'exists' => ($user != null)
            ]);
        }
        abort(400, '400 Bad Request');
    }

    //Consulta Ajax para saber si el email está registrado o no
    public function verifyEmail(Request $request){
        if($request->ajax()){
            $email = $request->input('val_input');
            $user = User::where('email', $email)->get()->first();
            return response()->json([
                'exists' => ($user != null),
            ]);
        }
        abort(400, '400 Bad Request');
    }
}
