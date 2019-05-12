<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class perfilController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    public function edit($id){

      return view('editarPerfil');
    }

    public function update($id){
      
    if (request('password') == NULL) {
      request()->validate([
        'name' => 'required',
        'lastName' => 'required'
        ]);
        $usuario = User::find($id);
        $usuario->name=request('name');
        $usuario->lastName=request('lastName');

        $usuario->save();

    } else {
      request()->validate([
        'name' => 'required',
        'lastName' => 'required',
        'password' => ['required', 'confirmed'],
        'password_confirmation' => 'required'
      ]);
      $usuario = User::find($id);
      $usuario->name=request('name');
      $usuario->lastName=request('lastName');
      $usuario->password=request('password');

      $usuario->save();
    }
    
    return redirect('/home');
    }
}
