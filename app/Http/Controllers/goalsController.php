<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\goal;
use App\lista;
use Auth;

class goalsController extends Controller
{
    /*public function getGoals()
    {
        $user = Auth::user();
        $lista = lista::first(); //where('user_id',$user->id)->get();
        //foreach($listas as $lista){
            $goals = goal::where('lista_id',$lista->id)->get();
        //}   
        //$goals = goal::where('lista_id',$listas->id)->get();
        return view('myList\goals',compact('goals'));
    }*/

    public function storeGoal(Lista $lista){

        $user = Auth::user();
        
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

        $goals = goal::where('lista_id',$lista->id)->get();

        return view('myList.edit',compact('lista','goals'));
    }

    public function destroyGoal(Lista $lista,$goal_id){

        $goal = goal::findOrFail($goal_id);
        $goal->delete();
        $goals = goal::where('lista_id',$lista->id)->get();

        return view('/myList.edit',compact('lista','goals'));
    }
}