<?php

namespace App\Http\Controllers;

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
