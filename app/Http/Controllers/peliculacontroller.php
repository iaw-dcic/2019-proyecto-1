<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\lista;
use App\pelicula;

class peliculacontroller extends Controller
{
    public function crearpelicula(){

    	$usuario = Auth::user();
  
    	if($usuario!=null){

	        $datos = request()->all();
	       
	        $pelicula=pelicula::create([ 'listaid' => $datos['listaid'],
	        'nombre' => $datos['nombre'],
	        'descripcion' => $datos['descripcion'], 
	        'genero' => $datos['genero']
	    	]);
	 		
    		$listaid=$datos['listaid'];
        	return redirect()->route('modificarlista',[$listaid]);
    	}else
    		return "ERROR: no se puede crear lista sin autenticarse";

    	return "PIMPIM";
    
    }
}
