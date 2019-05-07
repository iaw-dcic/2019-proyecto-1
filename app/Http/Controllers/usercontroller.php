<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class usercontroller extends Controller
{
    //
    public function mostrarperfil($id){
    	
    	$user = \App\User::find($id);
        $listas = \App\lista::where(['userid' => $id, 'visible' => true])->get();
        
        return view('perfil',compact('user','listas')); 
    }
    public function mostrarmiperfil(){
    	
    	$user = Auth::user();
 		if($user!=null){
 			$usuario = Auth::user()->id;
 			$listas = \App\lista::where(['userid' => $usuario])->get();
 			return view('miperfil',compact('user','listas')); 
 		}else{
 			$msg="You need to log in first!!!";
 			return view('error',compact('msg'));;
 		}
        
        
        
    }
    public function editarperfil(){
    	$usuario = Auth::user();

    	if($usuario!=null)
    		return view('editarmiperfil',compact('usuario'));
    	else{
 			$msg="You need to login first";
 			return view('error',compact('msg'));;
 		}
    }
    public function modificarperfil(){
    	
    	$usuario = Auth::user();
  		
    	if($usuario!=null){

	        $datos = request()->all();
	       	$usuario->name=$datos['name'];
	       	$usuario->email=$datos['email'];
	       	$usuario->biografia=$datos['biografia'];

	     	$usuario->save();
        	return redirect()->route('miperfil');
    	}else
    		return "ERROR: no se puede editar un usuario sin autenticarse";

    
    
    
        
        
    }
}
