<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;
use Session;

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
       $this -> validate(request(), [
            'nombre'=> 'required',
            'temporadas'=> 'required',
            //puntuacion falta
            'comentarios'=> 'required'
        ]);

        $serie = new Series();

        $serie->nombre = $request->nombre;
        $serie->temporadas = $request->temporadas;
        $serie->puntuacion= 5;
        $serie->comentarios = $request->comentarios;

        $series = Series::all();

        $serie->save();
        
        Session::flash('message', 'La serie fue creada exitosamente');
        return redirect('/miPerfil');
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
    public function edit(Series $series)
    {
        return view('editar',compact('series'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series)
    {
        $this -> validate(request(), [
            'nombre'=> 'required',
            'temporadas'=> 'required',
            //puntuacion falta
            'comentarios'=> 'required'
        ]);
        $serie->update($request->all());
        Session::flash('message', 'La serie fue editada exitosamente');
        return redirect('miPerfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
       // 
    }
}
