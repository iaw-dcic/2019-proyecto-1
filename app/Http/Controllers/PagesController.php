<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function profile($id){
        return view('profile', compact('id'));
    }

    public function createlist(){
        if(\Auth::check())
            return view('createlist');
        else
            return redirect('/login');
    }

    public function store(){
        request()->validate([
            'nombre' => 'required'
        ]);
        $lista = new \App\Lista();
        $lista->user_id = \Auth::id();
        $lista->name = request('nombre');
        if(request('compartir')=='on')
            $lista->share = true;
        else
            $lista->share = false;
        $lista->save();

        return redirect()->route('list', [$lista->id]);
        
    }

    public function list($id){

        $lista = \App\Lista::findorfail($id);
        
        if(\Auth::check()){
            if(\Auth::id()==$lista->user_id)
                return view('list', compact('lista'));
            else
                if($lista->share==1)
                    return view('list', compact('lista'));
                else
                    return redirect('/home');
            }
        else{
            if($lista->share==1)
                return view('list', compact('lista'));
            else
                return redirect('/home');
        }
    }

    public function update($id){
        $lista = \App\Lista::findorfail($id);
        request()->validate([
            'nombre' => 'required'
        ]);
        $lista->name = request('nombre');
        if(request('compartir')=='on')
            $lista->share = true;
        else   
            $lista->share=false;
        $lista->save();

        return view('list', compact('lista'));
    }
}
