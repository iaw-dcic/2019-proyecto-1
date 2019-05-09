<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;
use App\Http\Request\GeneroFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class GeneroController extends Controller
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
        $request->validate([
            'titulo'=>'required',
            'genero'=>'required',
            'anio'=>'required',
            'puntaje'=>'required',
        ]);
        
        $Pelicula=new Pelicula();//nuestro modelo
        $Pelicula->user_id=Auth::user()->id;
        $Pelicula->pelicula=$request->input('titulo');
        $Pelicula->genero=$request->input('genero');
        $Pelicula->anio=$request->input('anio');
        $Pelicula->puntaje=$request->input('puntaje');
        $Pelicula->publico=false;
        $Pelicula->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function BuscarPorCategoria($name)
    {
        return $name;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($titulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nom,$gen)
    {
        //
    }
}
