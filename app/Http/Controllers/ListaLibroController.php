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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\ListaLibro  $listaLibro
     * @return \Illuminate\Http\Response
     */
    public function show(ListaLibro $listaLibro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListaLibro  $listaLibro
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaLibro $listaLibro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListaLibro  $listaLibro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaLibro $listaLibro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListaLibro  $listaLibro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lista = ListaLibro::find($id);
        foreach ($lista->libros as $libro) {
            $libro -> delete();
        }
        $lista -> delete();
        $user = \Auth::user();
        $listas = $user->listaLibros;
        return view('listaLibros/edit-lista-libros', compact('listas'));
    }
}
