<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    /**Index se va a referir a nuestro modulo de usuario, cuya logica va a estar encapsulada en UserController  */
    public function index(){

        //usoEloquentModel para obtener la tabla de usuarios
        $users = User::all();

        //A la vista le paso un arreglo asociativo, donde cada fila va a ser (llave,valor)
        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**Muestra el detalle del usuario. */
    public function show($id){
        $user = User::find($id);
        if($user == null){
            return response()->view('errors.404',[],404);
        }
        else{
            return view('users.show', [
                'user'=> $user,
            ]);
        }
    }

    public function create(){
        return view('users.create');
    }

    public function store(){
        /**Recibimos los datos del formulario */
        $data = request()->validate([ //LLAVE=nombre del campo esperado => VALOR = cadena con las reglas de validacion
            'name' => 'required' //El campo nombre es requerido.
        ],[
            'name.required' => 'El campo nombre es obligatorio'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>$data['password'],
        ]);

        /**Redirecciono al usuario a detalles */
        return redirect()->route('users.index');
    }
}
