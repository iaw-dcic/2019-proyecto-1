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

    public function actualizar(Request $request)
    {
        // Conseguimos el objeto
        $usuario = User::where('name', '=', "auth()->user()->name ")->first();

        // Si existe
        if (count($usuario) >= 1) {
            // Seteamos un nuevo titulo
            $usuario->titulo = 'Sin limites modificada';

            // Guardamos en base de datos
            $usuario->save();
        }
    }
}
