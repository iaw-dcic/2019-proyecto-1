<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this -> validate(request(), [
            'nombre'=> 'required',
            'temporadas'=> 'required',
            'puntuacion'=> 'required',
            'comentarios'=> 'required'
        ]);

        $serie = new Series();

        $serie->nombre = $request->nombre;
        $serie->temporadas = $request->temporadas;
        $serie->puntuacion= $request->puntuacion;
        $serie->comentarios = $request->comentarios;
        $serie->id_usuario = $request->id_usuario;

        $serie->save();
        $redireccion='/miPerfil/'.$request->id_usuario;
        return redirect($redireccion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $serie)
    {
        return view('series.editar', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Series  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate(request(), [
            'nombre'=> 'required',
            'temporadas'=> 'required',
            'puntuacion'=> 'required',
            'comentarios'=> 'required'
        ]);

        $serie = Series::find($id);
        $serie ->nombre = $request->nombre;
        $serie ->temporadas = $request->temporadas;
        $serie ->comentarios = $request->comentarios;
        $serie ->puntuacion = $request->puntuacion;
        $serie->id_usuario = $request->id_usuario;
        
        $serie->save();

       $redireccion='/miPerfil/'.$serie->id_usuario;
       return redirect($redireccion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Series::find($id);
        $serie->delete();
        $redireccion='/miPerfil/'.$serie->id_usuario;
        return redirect($redireccion);
    }

    public function actualizarIdLista(Request $request, $id)
    {
        $serie = Series::find($id);
        $serie->id_lista=$request->id;
        $serie->save();
        $redireccion='/miPerfil/'.$serie->id_usuario;
        return redirect($redireccion);
    }

}
