<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Libro;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function inicio()
    {
        $listaDeBienes = Libro::all();
        return view('index', compact('listaDeBienes'));
    }

    public function search()
    {
        $perfil = Input::get('perfil');
        $usuarios = \App\User::where('name','LIKE', "%$perfil%")->get();
        return view('profile\search-profile', compact('usuarios', 'perfil'));
    }



    public function editProfile()
    {   
        $user = Auth::user();
        if($user){
            $profile = $user->profile;
            $listaLibros = $user->listaLibros;
            return view('profile/edit-profile',compact('profile','listaLibros'));
        }
        else{
            return redirect('/');
        }
    }
}
