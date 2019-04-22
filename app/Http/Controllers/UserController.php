<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('userView');
    }

    public function show(User $user)
    {
        //
    }

    public function login()
    {
        return view('loginView');
    }

    public function create()
    {
        return view('registerView');
    }

    public function store()
    {
            $data=request()->validate([
                'name' => 'required',
                'email' => ['required' , 'email', 'unique:users,email'],
                'password' => 'required',
            ],[
                'name.required' => 'El campo Nombre es obligatorio',
                'email.required' => 'El campo Email es obligatorio',
                'email.email' => 'Ingrese una dirección de email válida',
                'email.unique' => 'Ya existe usuario registrado con ese email',
                'password.unique'=> 'El campo Contraseña es obligatorio'
            ]);

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password'=> bcrypt($data['password'])
            ]);

            return redirect()->route('search');
    }   


}
