<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $perfil = \App\Perfil::find(Auth::user()->id);

        //si todavia no actualizo datos de perfil
        //lo mando vacio
        if (!$perfil) {
          $perfil = new \stdClass();
          $perfil -> edad = '';
          $perfil -> ciudad = '';
        }

        $listas = \App\Lista::where('id_user','=',Auth::user()->id)->simplePaginate(6);
        //var_dump($listas);
        return view('home',['perfil'=>$perfil,'listas'=>$listas]);
    }
}
