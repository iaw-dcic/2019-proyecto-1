<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lista;
use Auth;
use App\User;
use App\goal;

class listsController extends Controller
{
    public function getMyLists(){
    
        $user = Auth::user();
        $listas = lista::where('user_id',$user->id)->get();
        return view('Profile\myLists',compact('listas'));
    }

    public function createList(){
    
        return view('Profile\createList');
    }



    public function storeList(){

        $user = Auth::user();

        $lista = new Lista();

        $lista->name = request('nameList');
        $lista->user_id = $user->id;
        if(request('public')!=''){
            $lista->public = 1;
        }
        else {
            $lista->public = 0;
        }
        
        $lista->save();

        return redirect('myLists');
    }

    public function showList($id){

        $lista = lista::findOrFail($id);
        $goals = goal::where('lista_id',$lista->id)->get();
        return view('myList.show',compact('lista','goals'));
    }

    public function editList($id){

        $lista = lista::findOrFail($id);
        $goals = goal::where('lista_id',$lista->id)->get();
        return view('myList.edit',compact('lista','goals'));
    }

    public function updateList($id){

        $lista = lista::findOrFail($id);

        $lista->name = request('nameList');
        if(request('public')!=''){
            $lista->public = 1;
        }
        else {
            $lista->public = 0;
        }
        
        $lista->save();

        return redirect('/myLists');

    }

    public function destroyList($id){

        $lista = Lista::findOrFail($id);
        $goals = goal::where('lista_id',$lista->id)->get();
        foreach($goals as $goal)
            $goal->delete();
        $lista->delete();

        return redirect('/myLists');
    }
}
