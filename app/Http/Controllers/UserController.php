<?php

namespace App\Http\Controllers;
 
use Auth;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Receta;
use App\Lista;
use App\Ingrediente;
use App\Medida;
use App\ImageModel;
use Image;
 
use Illuminate\Validation\Rules;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

  class UserController extends Controller
{
    
    public function login(){
        return view('loginform');
    }
    public function postLogin(Request $request ) {
        if (Auth::attempt ( array (
                'email' => $request->get ( 'email' ),
                'password' => $request->get ( 'password' ) 
            ) )) {
            
            return Redirect::to ('/');
        } else {
            return back()->with('mensaje_error','Datos ingresados incorrectamente');
        }
    }
     
    public function crea(){
        return view('loginform');
    }

    /*Actualiza el perfil del usuario */
    public function actualizar(Request $request,$id){
        $user =  User::find($id);
       
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->descr = $request->descr;
    
        if($request->filename !=null){
        $originalImage= $request->file('filename');
        
        $thumbnailImage = Image::make($originalImage);
        
        $originalPath = public_path().'/img/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $imagen='img/'.time().$originalImage->getClientOriginalName();
        
        
        $user->avatar= $imagen;
    }

        if($user->save()){
            
        
            return back()->with('msj','Datos cargados correctamente');}
        else{
            return view('cocineros');
        }
         
     
         
    }

    // Metodo encargado de la redireccion a Facebook/Google
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
   
    public function store(UserRequest $request){


        $originalImage= $request->file('filename');
        if($originalImage!=null){
        $thumbnailImage = Image::make($originalImage);
        
        $originalPath = public_path().'/img/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $imagen='img/'.time().$originalImage->getClientOriginalName();
        }
        else{
            $imagen=null;
        }
      //  $this->validate($request, $rules);

       $user=  User::create([
            'nombre' => $request->nombre,
            'email' =>$request->email,
            'apellido'=>  $request->apellido,
            'password'=>Hash::make( $request->password),
            'avatar' =>$imagen
        ]);
        
        
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
            $user->avatar= $social_user->getAvatar();
            $user->save();
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
        $ingredientes= Ingrediente::orderBy('nombre', 'ASC')->get();
        $medidas= Medida::orderBy('nombre', 'ASC')->get();
        return view('perfil', [
            'perfil' =>  $perfil,
            'recetas' =>$recetas,
            'listas' =>$listas,
            'ingredientes' => $ingredientes,
            'medidas' => $medidas
        ]);
    }
   
}
    
