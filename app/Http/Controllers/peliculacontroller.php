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
    		{
 			$msg="You need to log in first";
 			return view('error',compact('msg'));;
 		}
    
    }
    public function eliminarpelicula($id){
    	$user=Auth::user();
    	if($user!=null){
	    	$usuario = Auth::user()->id;
	    	$pelicula =\App\pelicula::find($id); 
	    	$lista = \App\lista::find($pelicula->listaid);
	    	if($lista->userid==$usuario){
	    		$pelicula->delete();
	    		return redirect()->route('modificarlista',[$lista->id]);
	    	}else
	    		{
	 			$msg="You can not delete a movie that does not belongs to you";
	 			return view('error',compact('msg'));;
	 		}
	 	}else{
 			$msg="You need to log in first";
 			return view('error',compact('msg'));;
 		}   
 	}
}
