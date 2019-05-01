<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Colection;
use App\Element;

class WelcomeController extends Controller
{
    public function index(){
        
        $colecciones=Colection::where('estado',1)->get();

       return view('welcome', compact('colecciones'));
    }

    public function show($id){
        $coleccion=Colection::where('id', $id)->get();
        $items=Element::where('colection_id', $id)->get();
        $usuario=User::where('id', $coleccion[0]->user_id)->get();
        $datos=[$coleccion[0], $items, $usuario[0]];

        return view('showItems', compact('datos'));

    }
}
