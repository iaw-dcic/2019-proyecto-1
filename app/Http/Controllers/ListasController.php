<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\resources\views;
use App\Lista;
use Auth;

class ListasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas=  Lista::orderBy('nombre','ASC')->paginate(5);

        //retorno la vista y le paso las listas
        return view ('listas.index',compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
         //2da capa de validacion: si no la pasa me redirige a la misma pagina
        // $atributos= request()->validate([
        //    'name'=> ['required','min:3'],
        //    'cantidad_canciones'=> 'required',
        //]);
        $user_id= Auth::user()->id;

        $lista= new Lista(
                 request()->validate([
                        'nombre'=> ['required','min:3'],
                        'descripcion'=> 'required',
                    ],Lista::messages())
            );
        $lista->user_id= $user_id;    
        //'user_id','nombre','cantidad_canciones'
       //$atributos->user_id= $user_id;
       // $lista = Lista::create($atributos);
        $lista->save();

        return redirect('listas')->with('success','Lista \''.$lista->nombre.'\' ha sido creada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lista= Lista::findOrFail($id);

        return view('listas.show',compact('lista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //recibo ese objeto
        $lista= Lista::findOrFail($id);
        //y se lo paso a la vista
        return view('listas/edit',compact('lista','id'));
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

        $lista= Lista::findOrFail($id);

        $lista->update(request()->validate([
                           'nombre'=> ['required','min:3'],
                           'descripcion'=> 'required',
                      ],Lista::messages()));
        
       // $lista->save();           
         //Vuelvo al listado usando un get y muestro un mensaje flash
         return redirect('listas')->with('info','Lista \''.$lista->name.'\' ha sido editada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lista= Lista::findOrFail($id);
        $lista->delete();
           //Vuelvo al listado usando un get y muestro un mensaje flash
        return redirect('listas')->with('warning','La lista \''.$lista->name.'\' ha sido eliminada!');
    }
}
