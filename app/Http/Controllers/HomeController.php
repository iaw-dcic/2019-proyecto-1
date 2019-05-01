<?php

namespace App\Http\Controllers;

use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //Solo podemos acceder a estos métodos si estamos logeados
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * Cuando inicia sesión deberían verse todos sus partidos creados
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        
        $userActual= Auth::user();
        return view('home',['user'=>$userActual]);
    }
   
}
