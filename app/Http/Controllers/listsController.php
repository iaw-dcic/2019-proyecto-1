<?php

namespace App\Http\Controllers;

use App\Lista;
use Illuminate\Http\Request;

class listsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            
            $listas = auth()->user()->listas; //Obtengo todas las listas del usuario
            return view('profile',compact('listas')); //devuelvo una view junto con las listas
        }
        else{
            //es un guest mirando otro usuario, buscar lista del usuario visitado
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        return view('crearLista');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $lista = new Lista();
        $lista->titulo = request('titulo');
        $lista->descripcion = request('listaDescription');
        $lista->juegos = [];
        $lista->save(); //guarda la lista en la DB
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(Lista $lista)
    {
       $listaShow = [
        'nombre' => $lista->titulo,
        'descripcion' => $lista->descripcion,
        'juegos' => $lista->juegos
       ];
       return view('verLista')->with('lista',$listaShow);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista $lista)
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
        $this->middleware('auth');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista)
    {
        $this->middleware('auth');
    }

    //return request()->all(); //devuelve todos los datos a la pagina (token incluido)
}
