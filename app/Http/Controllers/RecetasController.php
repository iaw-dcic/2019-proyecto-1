<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\User;
use Auth;
  class RecetasController extends Controller
{
   
    public function index(){
      
        $recetas = Receta::orderBy('nombre', 'ASC')->get();
        $usuarios = User::orderBy('nombre', 'ASC')->get(); 
        //$ingredientes = Ingrediente_deReceta::
        return view('home', [
            //'user' => $user,
            'title' => 'Inicio', 
            'recetas' => $recetas,
            'usuarios' => $usuarios
        ]);
    }
    

}
