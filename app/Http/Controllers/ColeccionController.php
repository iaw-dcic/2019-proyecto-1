<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Colection;

class ColeccionController extends Controller
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

    public function index()
    {
        return view('crearColeccion');
    }

    public function create($id){
       
       Colection::create([
            'name'=>request('nameColec'),
            'description'=>request('desColec'),
            'estado'=>0,
            'user_id'=>$id
        ]);

        return redirect('home');
    }
}
