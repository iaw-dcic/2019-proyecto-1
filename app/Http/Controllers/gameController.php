<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gameController extends Controller
{
    public function create(){
        return view('crearJuego');
    }

    public function store(){
        $juego = new Juego();
        $juego->nombre = request('name');
        $juego->genero = request('genre');
        $juego->compania = request('company');
        $juego->fecha_salida = request('release_date');
        $juego->save();
        return redirect('profile'); 
    }
}
