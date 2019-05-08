<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Colection;
use App\Element;

class ElementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($idUsuario, $idColeccion){


        $coleccion = new Colection; 
        $coleccion=$coleccion ->findColection($idColeccion);
        dd($idUsuario);

        $items= $coleccion ->findElementos();
        $datos=[$coleccion, $items];
        return view('insertarItem', compact('datos'));
    }

    public function create($idUsuario, $idColeccion){

        Element::create([
            'name'=>request('nameItem'),
            'description'=>request('desItem'),
            'colection_id'=>$idColeccion,
            'nroPaginas'=>request('nroPag'),
            'edicion'=>request('edicion')
        ]);

        return redirect('home');
    }

    public function update($idUsuario, $idColeccion){
        
        $coleccion = new Colection; 
        $coleccion=$coleccion ->findColection($idColeccion);
        if($coleccion->estado){
            $coleccion->estado=0;
        }else{
            $coleccion->estado=1;
        }
        $coleccion->save();

        return redirect('home');

    }

    public function destroy($idUsuario, $idColeccion){

        Colection::find($idColeccion)->delete();

        return redirect('home');
    }
}
