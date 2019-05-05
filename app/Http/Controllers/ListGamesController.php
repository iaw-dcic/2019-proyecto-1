<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;
use App\Juego;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ListGamesController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth')->only(['store','edit','update','destroy']);
    }

    public function store(int $idLista){
        
        $juego = new Juego;
        $juego->list_id=$idLista;
        $juego->name=Input::get('title');
        $juego->genre=Input::get('genre');
        $juego->company=Input::get('company');
        $juego->release_date=Input::get('release_date');
        
        $juego->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(int $nombreJuego)
    {
        
      
        $juegoInfo = DB::table('juegos')->where('id',$nombreJuego)->get();
        $listID = $juegoInfo[0]->list_id;
        $lista = DB::table('listas')->where('id', $listID )->get();
        $userID = $lista[0]->user_id; 
    
        abort_if(!Auth::check() || $userID != auth()->id(), 403);
        return view('lists.games.edit', compact('juegoInfo'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(){
        $juego = Juego::findOrFail(request('gameId'));

        if(Input::get('title') != "")
            $juego->name = request('title');
        if(Input::get('genre') != "")
            $juego->genre =request('genre');
        if(Input::get('company') != "")
            $juego->company =request('company');
        if(Input::get('release_date') != "")
            $juego->release_date =request('release_date');

        $juego->save();
        $juegoId = $juego->list_id;
        return redirect('/lists');
    }

    public function show(int $idLista, int $idJuego)
    {   

        $idUsuario = DB::table('listas')->where('id',$idLista)->get();
        $idUsuario = $idUsuario[0]->user_id;
        $nombreUs = DB::table('users')->where('id',$idUsuario)->get();
        $nombreUs = $nombreUs[0]->name;
        $lista = Lista::where('id',$idLista)->get();
        abort_if($lista[0]->public == 0 &&  ($idUsuario != auth()->id()), 403);
        $datosJuego = DB::table('juegos')->where([ ['list_id',"=",$idLista,], ['id',"=",$idJuego] ])->get();
        
        return view('lists.games.show', compact('datosJuego','idLista','idUsuario','nombreUs'));
    }

      /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $juegoId)
    {
        $juego = Juego::findOrFail(request('gameId'));
        $juego->delete();
        return redirect('/lists');
    }
}
