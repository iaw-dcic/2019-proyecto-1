<?php

namespace App\Http\Controllers;

use App\ListaLibro;
use Illuminate\Http\Request;

class ListaLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $listas = $user->listaLibros;
        return view('listaLibros/edit-lista-libros', compact('listas'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listaLibro = new ListaLibro;
        $listaLibro -> user_id = \Auth::user()->id;
        $listaLibro -> save();
        return redirect('lista-libros');
    }

    public function toggleList(Request $request){
        $id = $request->input('id');
        $lista = ListaLibro::find($id);
        $lista->privada = !$lista->privada;
        $lista -> save();
        return redirect('lista-libros');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListaLibro  $listaLibro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    
        $lista = ListaLibro::findOrFail($request -> id_lista);
        foreach ($lista->libros as $libro) {
            $libro -> delete();
        }

        $lista -> delete();
        return back();
    }
}
