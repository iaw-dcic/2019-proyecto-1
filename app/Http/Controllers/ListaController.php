<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListaController extends Controller
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
      return view('create_list',['id_user'=>Auth::user()->id]);
  }

  public function create(Request $request)
  {
    $request->validate([
      'title' => 'required|alpha_spaces',
      'tags' => 'nullable|alpha_spaces',
    ]);

    var_dump($request->all());
    \App\Lista::create(['id_lista'=>0,'id_user'=>$request->id_user,'titulo'=>$request->title,'tags'=>$request->tags,'publica'=>$request->privacy]);


    return redirect('home');
  }

}
