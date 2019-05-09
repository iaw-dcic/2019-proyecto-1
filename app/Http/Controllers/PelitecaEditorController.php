<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Request\PelitecaEditorFormRequest;
use App\Genero;
use App\Pelicula;

class PelitecaEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $puntajes = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        $caters = Genero::all();
        $peliculas = Auth::user()->getPeliculas()->get();
        return view('PelitecaEditor', ['puntajes' => $puntajes ,'caters' => $caters ,'peliculas' => $peliculas ]);
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
        if(!empty($request->input('name')))
        {
            $genero=new genero();//nuestro modelo
            $genero->genero=$request->input('name');
            $genero->save();
        }
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id){
        $pelicula = Pelicula::find($id);
        $pelicula->publico = !($pelicula->publico);
        $pelicula->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->delete();
        return back();
    }
}
