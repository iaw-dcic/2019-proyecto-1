<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thing;
use App\User;

class PagesController extends Controller
{

    public function index(){
        
        $misListas = User::All();
        return view('index.index',compact('misListas'));
    
    
    }

	public function readme(){
        return view('index.readme');
    }

    public function show(String $usuario){
        
        $user = User::where('usuario', $usuario)->get();
        $misListas = Thing::where('user_id', $user->first()->id)->where('compartir',true) -> get();  
        $user = $user->first();
     
        return view('index.show',compact('user'),compact('misListas'));
    }
}
