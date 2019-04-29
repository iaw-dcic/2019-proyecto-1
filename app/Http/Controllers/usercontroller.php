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
}
