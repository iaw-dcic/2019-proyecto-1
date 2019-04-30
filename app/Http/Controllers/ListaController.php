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


    \App\Lista::create(['id_lista'=>0,'id_user'=>$request->id_user,'titulo'=>$request->title,'tags'=>$request->tags,'publica'=>$request->privacy]);


    return redirect('home');
  }

  public function edit_list(Request $request)
  {
    //recupero los datos de la lista
    $data = \App\Lista::find($request->id_lista);

    return view('edit_list',['data'=>$data]);
  }

  public function remove_list(Request $request)
  {
    //recupero los datos de la lista
    $data = \App\Lista::find($request->id_lista);
    return view('remove_list',['data'=>$data]);
  }

  public function destroy(Request $request)
  {
    //elimino las peliculas de la lista
    \App\Pelicula::where('id_lista','=',$request->id_lista)->delete();

    //elimino la lista
    \App\Lista::find($request->id_lista)->delete();

    return redirect('home');
  }

  public function update(Request $request)
  {
    $request->validate([
      'title' => 'required|alpha_spaces',
      'tags' => 'nullable|alpha_spaces',
    ]);

    \App\Lista::find($request->id_lista)->update(['titulo'=>$request->title,'tags'=>$request->tags,'publica'=>$request->privacy]);

    return redirect('home');
  }

  public function view_list(Request $request)
  {
    $lista = \App\Lista::find($request->id_lista);
    $peliculas = \App\Pelicula::where('id_lista','=',$request->id_lista)->get();

    return view('view_list',['lista'=>$lista,'peliculas'=>$peliculas]);
  }

}
