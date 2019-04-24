<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\resources\views;
use App\User;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //listar usuarios
    public function index()
    {
        $users=  User::orderBy('name','ASC')->paginate(3);

        //retorno la vista y le paso los usuarios de $users
        return view ('admin.users.index',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     //A traves de un POST
    public function store(Request $request)
    { 
        //creo nuevo usuario
          $user= new User($request->all());
        //cifro contrasenia
          $user->password = bcrypt($request->password);
        //guardo el nuevo usuario
          $user -> save();

         //Vuelvo al listado usando un get y muestro un mensaje flash
         return redirect()->route('users.index')->with('success','Usuario \''.$user->name.'\' ha sido creado con exito!');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        //encuentro ese objeto
        $user= User::find($id);
        //y se lo paso a la vista
        return view('admin/users/edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //en request recibo los nuevos datos del usuario
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email= $request->email;
        $user->save();
        
         //Vuelvo al listado usando un get y muestro un mensaje flash
         return redirect()->route('users.index')->with('info','Usuario \''.$user->name.'\' ha sido editado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('quiero eliminar el id: '.$id);
    }
}
