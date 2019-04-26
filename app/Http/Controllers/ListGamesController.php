<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;
use App\Juego;

class ListGamesController extends Controller
{
    public function store(Lista $lista){
        $lista->addGame(request('name','genre','company','release_date'));
        return back;
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function update(Juego $juego){

    }

    public function show(Juego $juego)
    {
        $juegoid = request('id');
        return view('games.show{ {{$juegoid}} }')->with('infoJuego',$juegoShow);
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
