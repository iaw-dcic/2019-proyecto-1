<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelicula;
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
        $Pelicula=new pelicula();//nuestro modelo
        $Pelicula->id=Auth::id();
        if(!empty($request->input('titulo')) and !empty($request->input('anio')) and !empty($request->input('puntaje')))
        {
             $Pelicula->pelicula=$request->input('titulo');
             $Pelicula->genero=$request->input('genero');
             $Pelicula->anio=$request->input('anio');
             $Pelicula->puntaje=$request->input('puntaje');
             $Pelicula->publico=false;
             $Pelicula->save();
        }
       return redirect('/home');
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
    public function edit($id)
    {
        $caters = DB::select('update peliculas Set publico = :dat where id = :id', ['dat' => true,'id'=> Auth::id()]);
        return redirect('home');
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
      //no
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nom,$cate,$anio)
    {
         $caters = DB::select('delete from peliculas where genero=:cate and pelicula=:nom and anio=:anio', ['nom' => $nom,'cate'=>$cate,'anio'=>$anio]);      
        return redirect('home');
    }
}
