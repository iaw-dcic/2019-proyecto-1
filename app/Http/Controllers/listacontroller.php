<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\lista;

class listacontroller extends Controller
{
    //
    public function listaspublicas(){
    	

        $listas = \App\lista::where(['visible' => true])->get();
        return view('listaspublicas',compact('listas')); 
    }
    public function listasusuario($id){
    	

        $listas = \App\lista::where(['userid'=>$id, 'visible' => true])->get();
        
        return view('listasusuario',compact('listas')); 
    }
    public function getlista($id){
    	$lista = \App\lista::find($id);
    	$peliculas = \App\pelicula::where(['listaid'=>$id])->get();
    	if($lista->visible==true)
    		return view('listapublica',compact('lista','peliculas'));
    	else
    		return "ERROR ESTA TRATANDO DE ACCEDER A UNA LISTA PRIVADA";
    }
    public function eliminarlista($id){
    	$usuario = Auth::user()->id;
    	$lista = \App\lista::find($id);
    	$peliculas = \App\pelicula::where(['listaid'=>$id])->get();
    	if($lista->userid==$usuario){
    		
    		foreach ($peliculas as $peli) {
    			$peli->delete();
    		}
    		$lista->delete();
    		return redirect()->route('miperfil');
    	}
    	else
    		return "ERROR: no se puede eliminar una lista que no te pertenece";

    }
    public function modificarlista($id){
    	$usuario = Auth::user()->id;
    	$lista = \App\lista::find($id);
    	$peliculas=\App\pelicula::where(['listaid'=>$id])->get();
    	if($lista->userid==$usuario)
    		return view('modificarlista',compact('lista','peliculas'));
    	else
    		return "ERROR: no se puede eliminar una lista que no te pertenece";

    }
    public function crearlista(){
    	$usuario = Auth::user();
  
    	if($usuario!=null){

	        $datos = request()->all();
	       	$listapublica=0;
	        if(array_key_exists('visible',$datos))
	        	$listapublica=1;
	        $lista=lista::create([ 'userid' => $usuario -> id,
	        'nombre' => $datos['nombre'],
	        'visible' => $listapublica, ]);
	 		
    		$listaid=$lista->id;
        	return redirect()->route('modificarlista',[$listaid]);
    	}else
    		return "ERROR: no se puede crear lista sin autenticarse";

    	return "PIMPIM";
    }
    public function creacionlista(){
    	$usuario = Auth::user();
  
    	if($usuario!=null)
    		return view('crearlista');
    	else
    		return "ERROR: no se puede crear lista sin autenticarse";
    }

}
