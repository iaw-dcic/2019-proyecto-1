<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        //$caters = DB::select('select categoria from categorias where id='Auth::id()'', [1]);
        $caters = DB::select('select categoria from categorias ');
        $autos = DB::select('select auto ,categoria,cv,publico from autos where id = :id', ['id' => Auth::id()]);
        return view('home', ['caters' => $caters ,'autos' => $autos ]);
        //return view('home', ['caters' => $caters ]);
       // return view('home');
    }
}
