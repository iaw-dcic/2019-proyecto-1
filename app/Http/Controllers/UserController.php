<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('perfil');
    }

    public function actualizar()
    {
        // Conseguimos el objeto
        $usuario = User::where('name', '=', "auth()->user()->name ")->first();

        // Si existe
        if (count($usuario) >= 1) {
            // Seteamos un nuevo titulo
            $usuario->name = request('name');
        $usuario->ciudad = request('city');

            // Guardamos en base de datos
            $usuario->save();
        }
    }


    public function update()
    {
        $user = auth()->user();
        
      //  $user = User::findOrFail(auth()->user()->id);

      if (request('name') == '')
    {
        $user->name = auth()->user()->name;
    }
    else
    {
        $user->name = request('name');
    }

    if (request('city') == '')
    {
        $user->ciudad = auth()->user()->ciudad;
    }
    else
    {
        $user->ciudad = request('city');
    }

    if (request('bio') == '')
    {
        $user->bio = auth()->user()->bio;
    }
    else
    {
        $user->bio = request('bio');
    }

        $user->save();

        return view('perfil');
    }

}
