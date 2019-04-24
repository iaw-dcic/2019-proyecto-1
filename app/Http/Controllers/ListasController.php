<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\resources\views;
use App\Lista;

class ListasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas=  Lista::orderBy('name','ASC')->paginate(5);

        //retorno la vista y le paso las listas
        return view ('admin.listas.index',compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/listas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //2da capa de validacion: si no la pasa me redirige a la misma pagina
         $atributos= request()->validate([
            'name'=> ['required','min:3'],
            'cantidad_canciones'=> 'required',
        ],Lista::messages());

        //con los atributos ya validados, creo el usuario
        $lista = Lista::create($atributos);

        return redirect()->route('listas.index')->with('success','Lista \''.$lista->name.'\' ha sido creada con exito!');
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
    public function edit(Lista $lista)
    {
        //recibo ese objeto
        //y se lo paso a la vista
        return view('admin/listas/edit',compact('lista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Lista $lista)
    {
        $lista->update(request()->validate([
                            'name'=> ['required','min:3'],
                            'cantidad_canciones'=> 'required',
                        ],Lista::messages()));
        
         //Vuelvo al listado usando un get y muestro un mensaje flash
         return redirect()->route('listas.index')->with('info','Lista \''.$lista->name.'\' ha sido editada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista)
    {
           $lista->delete();
           //Vuelvo al listado usando un get y muestro un mensaje flash
           return redirect()->route('listas.index')->with('warning','lista \''.$lista->name.'\' ha sido eliminada!');
    }
}
