<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index($id)
    {
        $user = \App\User::find($id);
        $listasPublicas = \App\ListaLibro::where(['user_id' => $id, 'privada' => false])->get();
        return view('profile/details-profile',compact('user','listasPublicas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'city' => 'required'
        ]);
        $profile = Profile::query()->where('user_id', Auth::user()->id)->first();
        $profile -> Nombre = $request ->input('name');
        $profile -> Apellido = $request -> input('surname');
        $profile -> Ciudad = $request -> input('city');
        $profile -> save();
        return back();
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
