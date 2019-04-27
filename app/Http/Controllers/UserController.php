<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**Index se va a referir a nuestro modulo de usuario, cuya logica va a estar encapsulada en UserController  */
    public function index(){
        //A la vista le voy a pasar la base de datos despues
        $users = [
            'Bronx',
            'Columbus',
            'Mulaika',
            'Wirkonnen',
            'Ramiro',
            'Carlos',
        ];

        //A la vista le paso un arreglo asociativo, donde cada fila va a ser (llave,valor)
        return view('users', [
            'users' => $users,
        ]);
    }

    /**Muestra el detalle del usuario. */
    public function show($id){
        return "Seccion de configuracion del usuario : {$id}";
    }

    public function registro(){
        return 'Seccion para que un usuario se registre';
    }
}
