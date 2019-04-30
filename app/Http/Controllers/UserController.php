<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
	public function editarPerfil(Request $request)
	{
        $user=User::find( $request ->idUsuario);
        if ($user->email == $request->email)
        {
            $this -> validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            $user->name=$request -> name;
            $user->save();
            $redireccion='/miPerfil/'.$request->idUsuario;
            return redirect($redireccion);
        }
        else{
            $this -> validate(request(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

            $user->name=$request -> name;
            $user->email=$request -> email;
            $user->save();
            $redireccion='/miPerfil/'.$request->idUsuario;
            return redirect($redireccion);
        }
    }
}
