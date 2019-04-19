<?php

namespace App\Http\Controllers;
 
use Auth;
use Illuminate\Http\Request;
use Socialite;
use App\User;

 
  class UserController extends Controller
{


    

    public function login(){
        return view('loginform');
    }
    public function crea(){
        return view('loginform');
    }

    // Metodo encargado de la redireccion a Facebook/Google
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    public function store(request $request){
        print_r($request->input);
        $this->validate(request(), [
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['nombre','apellido','email', 'password']));
        
        Auth::login($user);
        
        return redirect()->to('/');
    }
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {      
         
        // Obtenemos los datos del usuario
        if($provider != 'twitter'){
        $social_user = Socialite::driver($provider)->stateless()->user(); 

         }
        else
        $social_user = Socialite::driver($provider)->user(); 
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->getEmail())->first()) { 
           
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = User::create([
                'nombre' => $social_user->getName(),
                'email' => $social_user->getEmail(),
                'avatar'=>  $social_user->getavatar()
            ]);

            return $this->authAndRedirect($user); // Login y redirección
        }
    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect()->to('/');
    }

    public function logout(){
        Auth::logout();
        return  redirect()->to('/');
    }

   
}
    
