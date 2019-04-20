<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listsController extends Controller
{
    public function index(){
        $listas = auth()->user()->listas; //Obtengo todas las listas del usuario

        return view('profile',compact('listas')); //devuelvo una view junto con las listas
    }

    public function create(){
        return view('crearLista');
    }

    public function store(){

        $lista = new Lista();

        $lista->titulo = request('titulo');

        $lista->descripción = request('listaDescription');

        $lista->save(); //guarda la lista en la DB
        return redirect('/profile');
        //return request()->all(); //devuelve todos los datos a la pagina (token incluido)
    }
}
