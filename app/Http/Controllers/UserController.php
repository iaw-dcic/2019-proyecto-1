<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['profile']);
    }

    public function profile(User $user)
    {

        return view('user.user',compact('user'));

    }

    public function edit()
    {
        //Obtengo el user logueado
        $user = auth()->user();

        return view('user.settings',compact('user'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();

        return view('user.home',compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        //Chequeo que el usuario este autorizado para editar
        \abort_if(auth()->user()->id !== $user->id,405);

        //Valido la entrada
        $datos = $request->validate([
            'name' => ['required','string','min:3', 'max:255'],
            'nombre' => ['required','string','min:3', 'max:255'],
            'about' => ['nullable','string']
        ]);

        //Asigno las modificaciones
        $user->name=$datos['name'];
        $user->nombre=$datos['nombre'];
        $user->about=$datos['about'];

        $user->update();

        //Preparo variables para la redireccion
        $parametros=[
            'user' => $user->id
        ];
        return redirect()->route('profile',$parametros);
    }
}
