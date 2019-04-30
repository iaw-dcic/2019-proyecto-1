<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeliculaController extends Controller
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
  public function add(Request $request)
  {

    return view('create_movie',['id_lista'=>$request->id_lista]);
  }

  public function edit_movie(Request $request)
  {
    # code...
  }


  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|alpha_spaces',
      'genre' => 'nullable|alpha_spaces',
      'rating'=> 'nullable|integer|between:0,10'
    ]);


    //\App\Pelicula::create(['id_lista'=>0,'id_user'=>$request->id_user,'titulo'=>$request->title,'tags'=>$request->tags,'publica'=>$request->privacy]);


    //return redirect('home');
  }
  }
