<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\validarExistenciaNickName;
use App\partido;

class BusquedaController extends Controller
{
    public function buscarUsuario(Request $request)
    {
        $data = $request->all();
       
        $request->validate([
            'searchnickname' => ['required', 'string', 'max:255', new validarExistenciaNickName()],
          ]); 

        $userBuscado= User::where('nickname',$data['searchnickname'])->get()->first();
        $idUsuario = $userBuscado->id;
        
        $partidosPublicos= partido::where('public',"Public")->where('user_id',$idUsuario)->get();
       
        
        return view('/perfilPublico',['user'=>$userBuscado],['partidos'=>$partidosPublicos]);
    }
}

