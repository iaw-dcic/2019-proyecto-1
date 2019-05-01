<?php

namespace App\Http\Controllers;

use App\partido;

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
}
