<?php

namespace App\Http\Controllers;

use App\Juego;
use Illuminate\Http\Request;

class gamesController extends Controller
{
    protected $juego;

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
        return view('crearJuego');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $juego = new Juego();
        $juego->nombre = request('name');
        $juego->genero = request('genre');
        $juego->compania = request('company');
        $juego->fecha_salida = request('release_date');
        $juego->save();
        return redirect('profile'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function show(Juego $juego)
    {
        $juegoid = request('id');
        return view('games.show{ {{$juegoid}} }')->with('infoJuego',$juegoShow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function edit(Juego $juego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juego $juego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juego $juego)
    {
        //
    }
}
