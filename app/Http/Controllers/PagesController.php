<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thing;
use App\User;
use App\Item;
class PagesController extends Controller
{

    public function index(){
        
        $misListas = User::All();
        return view('index.index',compact('misListas'));
    }

	public function readme(){
        return 1;
        return view('index.readme');
    }

    public function show(String $usuario){
        
        $user = User::where('usuario', $usuario)->get();
        $misListas = Thing::where('user_id', $user->first()->id)->where('compartir',true) -> get();  
        $user = $user->first();
     
        return view('index.show',compact('user'),compact('misListas'));
    }

    public function showItem($usuario, $thing){
        
        $items = Item::where('thing_id', $thing)-> get();
        $lista = Thing::where('id',$thing)->get()->first();
  
        return view('index.showItem', compact('items'), compact('lista'));
    }

    public function showUser($usuario){
        
        $users = User::where('usuario', $usuario)-> get();
        $user = $users-> first();
   
        return view('index.showUser', compact('user'));
    }


}
