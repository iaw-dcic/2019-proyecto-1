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

    public function storeGoal($id){

        $user = Auth::user();
        $lista = lista::findOrFail($id);

        $goal = new Goal();

        $goal->autor = request('autorGoal');
        $goal->equipo = request('equipoGoal');
        $goal->equipo_rival = request('equipo_rivalGoal');
        $goal->anio = request('anioGoal');
        $goal->lista_id = $lista->id;
        $goal->save();

        $goals = goal::where('lista_id',$lista->id)->get();

        return view('myList.edit',compact('lista','goals'));
    }

    public function destroyGoal($lista_id,$goal_id){

        $goal = goal::findOrFail($goal_id);
        $lista = Lista::findOrFail($lista_id);
        $goal->delete();
        $goals = goal::where('lista_id',$lista->id)->get();

        return view('/myList.edit',compact('lista','goals'));
    }
}