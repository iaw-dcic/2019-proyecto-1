<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\resources\views;
use App\User;
use Auth;
use Laracasts\Flash\Flash;

class UsuariosController extends Controller
{


  //middleware
  public function __construct()
  {
      $this->middleware('auth',['except'=>['index']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //listar usuarios
    public function index()
    {
        //puedo ver la lista de usuarios, estando logueado o no

        $users=  User::orderBy('name','ASC')->paginate(3);

        //retorno la vista y le paso los usuarios de $users
        return view ('users.index',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('invalido');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     //A traves de un POST
    public function store()
    { 
        //2da capa de validacion: si no la pasa me redirige a la misma pagina
        $atributos= request()->validate([
                        'name'=> ['required','min:3'],
                        'email'=> ['required','unique:users'],
                        'password'=> ['required', 'min:4'],
                    ],User::messages());

        //con los atributos ya validados, creo el usuario
        $user = User::create($atributos);

        Flash::success("Usuario ".$user->name." ha sido creado con exito! ");

        return redirect()->route('users.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //muestra las canciones de una lista en este caso
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //recibo ese objeto
        //y se lo paso a la vista
        return view('users/edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //en request recibo los nuevos datos del usuario
    public function update(User $user)
    {
        $user->update(request()->validate([
                            'name'=> ['required','min:3'],
                            'email'=> 'required',
                        ],User::messages())
                    );
        
        Flash::success("Usuario ".$user->name." ha sido editado con exito! ");

         //Vuelvo al listado usando un get 
         return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //$user= User::findOrFail($id);  no necesario si recibo el user en lugar de: recibir id y luego buscar ese user

        $user->delete();

        Flash::success("Usuario ".$user->name." ha sido eliminado con exito! ");
         //Vuelvo al listado usando un get 
         return redirect()->route('users.index');
    }
}
