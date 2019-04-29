<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;
use App\Juego;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class ListGamesController extends Controller
{
    public function store(int $idLista){
        
        $juego = new Juego;
        $juego->list_id=$idLista;
        $juego->name=Input::get('title');
        $juego->genre=Input::get('genre');
        $juego->company=Input::get('company');
        $juego->release_date=Input::get('release_date');
        
        $juego->save();
        //$lista->addGame(request('name','genre','company','release_date'));
        return back();
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function update(Juego $juego){

    }

    public function show(int $idLista, int $idJuego)
    {
        $datosJuego = DB::table('juegos')->where([ ['list_id',"=",$idLista,], ['id',"=",$idJuego] ])->get();
    
        return view('/lists/{{$idLista}}/{{$idJuego}}/show', compact('datosJuego'));
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
