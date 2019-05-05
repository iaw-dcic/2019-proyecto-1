<?php

namespace App\Http\Controllers;

use App\partido;
use App\player;
class InicioController extends Controller
{
    public function index()
    {
        $partidospublicos = Partido::where('public', "Public")->get();

        return view('/inicio', ['partidos' => $partidospublicos]);
    }

    public function readme(){
        return view('readme');
    }

    public function viewJugadores($id)
    {
        $partido = partido::where('id',$id)->get()->first();
        $jugadores = player::where('id_partido',$id)->get();
        return view('listaJugadores',['jugadores'=>$jugadores],['partido'=>$partido]);
    }
}
