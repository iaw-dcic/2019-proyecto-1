<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
Use App\Lista;
Use App\Profile;
class PublicController extends Controller
{
    public function index($usr)
    {
        $usr_obj= User::where('name','=',$usr)->first();
        abort_if(!$usr_obj,404);
        $profile= $usr_obj->profile;

        $listas = User::find($usr_obj->id)->listas->where('lista_publica','=','1');
        return view('profile.profilePublic',['usr'=> $usr_obj->name])->with('listas',$listas)->with('usr_img',$profile->imagen)->with('usr_acerca',$profile->acerca_de);
    }

    public function show($usr,$id)
    {   
        
        $lista=Lista::find($id);
        abort_if(!$lista,404);
        abort_if(!$lista->lista_publica,403,'permiso denegado');

        return view('public.showLista')->with('libros',$lista->libros)->
        with('usr',$usr)->with('lista',$lista);
    }
}
