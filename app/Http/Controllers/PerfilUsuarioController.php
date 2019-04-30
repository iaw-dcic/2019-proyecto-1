<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Rules\validarNickname;
use App\Rules\validarEmail;

class PerfilUsuarioController extends Controller
{
    public function index()
    {
        $userActual = Auth::user();
        return view('/editarPerfil', ['user' => $userActual]);
    }

    public function editarPerfil(Request $request, $id)
    {
        $userAmodificar  = User::where('id', $id)->get()->first();
        $data = $request->all();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255', new validarNickName($data['nickname'])],
            'email' => ['required', 'max:255', new validarEmail()],
        ]);

        /**Si el nombre cambio */
        if (strcmp($data['name'], $userAmodificar->name) != 0)
            $userAmodificar->update(['name' => $data['name']]);
        /**Si el nickname cambio */
        if (strcmp($data['nickname'], $userAmodificar->nickname) != 0)
             $userAmodificar->update(['nickname' => $data['nickname']]);
        /**Si el email cambio */
        if (strcmp($data['email'], $userAmodificar->email) != 0)
             $userAmodificar->update(['email' => $data['email']]);
    
            return view('/home',['user'=>$userAmodificar]);
       }
}
