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
    public function eliminarpelicula($id){
    	$usuario = Auth::user()->id;
    	$pelicula =\App\pelicula::find($id); 
    	$lista = \App\lista::find($pelicula->listaid);
    	if($lista->userid==$usuario){
    		$pelicula->delete();
    		return redirect()->route('modificarlista',[$lista->id]);
    	}else
    		return "ERROR: no se puede eliminar una pelicula que no te pertenece";
    }
}
