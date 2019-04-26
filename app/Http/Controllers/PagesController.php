<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function profile($id){

        $user = \App\User::findorfail($id);

        return view('profile', compact('user'));
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

    public function createcar($id){

        $lista = \App\Lista::findorfail($id);
        if(\Auth::check())
            if(\Auth::id()==$lista->user_id)
                return view('createcar', compact('id'));
            else
                return redirect('/home');
        else
            return redirect('/login');
    }

    public function storecar($id){
        request()->validate([
            'brand' => 'required',
            'model' => 'required',
            'version' => 'required'
        ]);
        $car = new \App\Car();
        $car->lista_id = $id;
        $car->brand = request('brand');
        $car->model = request('model');
        $car->version = request('version');
        $car->save();

        return redirect()->route('list', [$id]);
        
    }

    public function editcar($id, $carid){

        $lista = \App\Lista::findorfail($id);
        $car = \App\Car::findorfail($carid);
        if(\Auth::check())
            if(\Auth::id()==$lista->user_id)
                return view('editcar', compact('car'));
            else
                return redirect('/home');
        else
            return redirect('/login');
    }

    public function updatecar($id, $carid){

        $car = \App\Car::findorfail($carid);
        request()->validate([
            'brand' => 'required',
            'model' => 'required',
            'version' => 'required'
        ]);
        $car->brand = request('brand');
        $car->model = request('model');
        $car->version = request('version');
        $car->save();

        return redirect()->route('list', [$id]);
    }

    public function deletecar($id, $carid){

        \App\Car::find($carid)->delete();

        return redirect()->route('list', [$id]);

    }

    public function publiclists(){

        $lists = \App\Lista::all();

        return view('publiclists', compact('lists'));
        
    }
    
}
