<?php

namespace App\Http\Controllers;

use App\ListaUsuarios;
use App\Series;
use App\User;
use Illuminate\Http\Request;

class ListaUsuariosController extends Controller
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
    public function create(Request $request)
    {
        return view('listas.create');
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
            'nombre_lista'=> 'required',
            'publica'=> 'required',
        ]);
        echo $request;
        $lista = new ListaUsuarios();

        $lista->nombre_lista = $request->nombre_lista;
        $lista->publica = $request->publica;
        $lista->idUsuario= $request->id_usuario;;

        $lista->save();
        $redireccion='/miPerfil/'.$lista->idUsuario;
        return redirect($redireccion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListaUsuarios  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(ListaUsuarios $lista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListaUsuarios  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaUsuarios $lista)
    {
        $user=User::find($lista->idUsuario);
        $serie = $user->series;
        return view('listas.editar', ['serie'=> $serie], ['lista'=> $lista]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListaUsuarios  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate(request(), [
            'nombre_lista'=> 'required',
            'publica'=> 'required',
        ]);

        $lista = ListaUsuarios::find($id);
        $lista ->nombre_lista = $request->nombre_lista;
        $lista ->publica = $request->publica;
        $lista->idUsuario = $request->id_usuario;
        
        $lista->save();

       $redireccion='/miPerfil/'.$lista->idUsuario;
       return redirect($redireccion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeriesCompartidas  $seriesCompartidas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lista = ListaUsuarios::find($id);
        foreach ($lista->seriesAsociadas as $series)
        {
            $series->id_lista=NULL;
            $series->save();
        }
        $lista->delete();
        $redireccion='/miPerfil/'.$lista->idUsuario;
        return redirect($redireccion);
    }
}
