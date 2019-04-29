<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Perfil;

class PerfilController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');

  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
      $perfil = \App\Perfil::find(Auth::user()->id);

      //si todavia no actualizo datos de perfil
      //lo mando vacio
      if (!$perfil) {
        $perfil = new \stdClass();
        $perfil -> id_user = Auth::user()->id;
        $perfil -> edad = '';
        $perfil -> ciudad = '';
      }
      return view('edit_profile',['perfil'=>$perfil]);
  }
  public function update(Request $request, Perfil $perfil)
  {
    $request->validate([
      'age' => 'numeric',
      'city' => 'alpha_spaces',
    ]);

    $perfil -> edad = $request -> age;
    $perfil -> ciudad = $request -> city;

    \App\Perfil::updateOrCreate(['id_user'=> Auth::user()->id],['edad'=> $perfil-> edad,'ciudad'=>$perfil -> ciudad]);

    return view('home',['perfil'=>$perfil]);
  }
}
