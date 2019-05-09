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
    //retorna las listas publicas de un usuario
    public function listasusuario($id){
    	

        $listas = \App\lista::where(['userid'=>$id, 'visible' => true])->get();
        
        return view('listasusuario',compact('listas')); 
    }
    public function getlista($id){
    	$lista = \App\lista::find($id);
    	$peliculas = \App\pelicula::where(['listaid'=>$id])->get();
    	if($lista->visible==true)
    		return view('listapublica',compact('lista','peliculas'));
    	else{
    		$user=Auth::user();
    		if($user!=null && $user->id==$lista->userid){
    			return view('listapublica',compact('lista','peliculas'));	
    		}else{
    			$msg="You can not see a private list that does not belongs to you";
    			return view('error',compact('msg'));
    		
    		}
    	}
 			
    }
    public function eliminarlista($id){
    	$user=Auth::user();

    	if($user!=null){
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
	    	else{
	 			$msg="You can not delete a list that does not belongs to you";
	 			return view('error',compact('msg'));;
	 		}
	 	}else{
 			$msg="You need to log in first";
 			return view('error',compact('msg'));;
 		}

    }
    public function modificarlista($id){
    	$user=Auth::user();
    	if($user==null){
    		$msg="You need to log in first";
 			return view('error',compact('msg'));;
    	}

    	$usuario = Auth::user()->id;
    	$lista = \App\lista::find($id);
    	$peliculas=\App\pelicula::where(['listaid'=>$id])->get();
    	if($lista->userid==$usuario)
    		return view('modificarlista',compact('lista','peliculas'));
    	else{
 			$msg="You can not delete a list that does not belongs to you";
 			return view('error',compact('msg'));;
 		}
        
    }
    public function cambiarvisibilidad($id){
    	$user = Auth::user();
    	$lista = \App\lista::find($id);
    	if($user==null){
    		$msg="You need to log in first";
 			return view('error',compact('msg'));;
    	}
    	if($lista==null){
    		$msg="List do not exist";
 			return view('error',compact('msg'));;
    	}
    	if($lista->userid==$user->id){
    		if($lista->visible==true)
    			$lista->visible=false;
    		else
    			$lista->visible=true;
    		$lista->save();
    	}else{
    		$msg="List does not belongs to you";
 			return view('error',compact('msg'));;
    	}

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
    	}else{
 			$msg="You need to log in first!!!";
 			return view('error',compact('msg'));;
 		}
        

    	return "PIMPIM";
    }
    public function creacionlista(){
    	$usuario = Auth::user();
  
    	if($usuario!=null)
    		return view('crearlista');
    	else{
 			$msg="You need to log in first!!!";
 			return view('error',compact('msg'));;
 		}
        
    }

}
