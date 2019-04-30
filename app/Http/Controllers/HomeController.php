<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lista;

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
        $listas = Lista::where('user_id', auth()->id())->get();

        $number = count($listas);

        return view('home', compact('number'));
    }
}
