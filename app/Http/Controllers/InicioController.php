<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\partido;

class InicioController extends Controller
{
    public function index()
    {
        $partidospublicos = Partido::where('public',"Public")->get();
        
        return view('/inicio',['partidos'=>$partidospublicos]);
    }
}
