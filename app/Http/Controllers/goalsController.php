<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\goal;
use App\lista;

class goalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeGoal(Lista $lista){
        
        $goal = new Goal();

        request()->validate([
            'autor' => ['required','min:3','max:25'],
            'equipo' => ['required','min:3','max:25'], 
            'equipo_rival' => ['required','min:3','max:25'], 
            'año' => ['required','min:1901','max:2019','numeric']  
        ]);

        $goal->autor = request('autor');
        $goal->equipo = request('equipo');
        $goal->equipo_rival = request('equipo_rival');
        $goal->anio = request('año');
        $goal->lista_id = $lista->id;
        
        $goal->save();

        $goals = $lista->goals();

        return view('myList.edit',compact('lista','goals'));
    }

    public function destroyGoal(Lista $lista, $goal_id){

        $goal = goal::findOrFail($goal_id);
        $goal->delete();

        $goals = $lista -> goals();

        return view('/myList.edit',compact('lista','goals'));
    }
}