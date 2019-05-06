<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Colection;
use App\Element;

class WelcomeController extends Controller
{
 

    public function index(){
        $colecciones=Colection::findPublics();

       return view('welcome', compact('colecciones'));
    }
    
    public function show($id){

        $coleccion= new Colection;
        $coleccion = $coleccion ->findColection($id);
        $items= $coleccion ->findElementos();
        $usuario=User::find($coleccion->user_id);
        $datos=[$coleccion, $items, $usuario];

        return view('showItems', compact('datos'));

    }
}
