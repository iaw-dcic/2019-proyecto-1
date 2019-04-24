<?php

namespace App\Http\Controllers;
 
use Auth;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Receta;
use App\Lista;
use Illuminate\Validation\Rules;
use App\Http\Requests\UserRequest;
  class UserController extends Controller
{
    
    public function login(){
        return view('loginform');
    }
    public function crea(){
        return view('loginform');
    }
    public function actualizar(UserRequest $request,$id){
        $user =  User::find($id);
       
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->descr = $request->descr;
        if($user->save()){
            return redirect('/');}
         
     
        return back()->with('status','Datos actualizados correctamente');
    }

    // Metodo encargado de la redireccion a Facebook/Google
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
   
    public function store(UserRequest $request){
        
       
      //  $this->validate($request, $rules);

        User::create([
            'nombre' => $request->nombre,
            'email' =>$request->email,
            'apellido'=>  $request->apellido,
            'password'=>  $request->password
        ]);
        
        
        Auth::login($user);
        
        return back()->with('status','Datos cargados correctamente');
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

    public function perfil($id){
        $perfil=User::find($id); 
        $listas=Lista::where('usuario','=',$id)->get();
        $recetas= Receta::where('id_autor', $id)->get();

        return view('perfil', [
            'perfil' =>  $perfil,
            'recetas' =>$recetas,
            'listas' =>$listas
        ]);
    }
   
}
    
