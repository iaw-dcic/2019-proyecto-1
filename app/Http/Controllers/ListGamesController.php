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
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(String $nombreJuego)
    {

        $juegoInfo = DB::table('juegos')->where('name',$nombreJuego)->get();
        return view('lists.games.edit', compact('juegoInfo'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function update(){

        $juego = Juego::findOrFail(request('gameId'));
        $juego->name =Input::get(request('title'));
        $juego->genre =Input::get(request('genre'));
        $juego->company =Input::get(request('company'));
        $juego->release_date =Input::get(request('release_date'));
        $juego->save();
        $juegoId = $juego->list_id;
        dd('estoy en el update');
        return view('lists.games.show')->with('name',$userName);
    }

    public function show(int $idLista, int $idJuego)
    {   
        $idUsuario = DB::table('listas')->where('id',$idLista)->get();
        $idUsuario = $idUsuario[0]->user_id;
        $nombreUs = DB::table('users')->where('id',$idUsuario)->get();
        $nombreUs = $nombreUs[0]->name;
        $datosJuego = DB::table('juegos')->where([ ['list_id',"=",$idLista,], ['id',"=",$idJuego] ])->get();
        
        return view('lists.games.show', compact('datosJuego','idLista','idUsuario','nombreUs'));
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Juego  $juego
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juego $juego)
    {

        return redirect('lists.index');
    }
}
