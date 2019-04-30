<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cancion;
use App\Lista;
use Auth;
use Laracasts\Flash\Flash;

class CancionesController extends Controller
{

     //middleware
     public function __construct()
     {
         $this->middleware('auth',['except'=>['index']]);
     }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //recibo el id de lista
    public function index($id)
    {
        //busco el usuario y si no existe ninguno no me muestra nada (cuestion seguridad)
        if (Auth::user() == null)
            return redirect('/login');


        $lista= Lista::findOrFail($id);
        //id de lista
        $canciones=  Cancion::where('lista_id',$id)->paginate(10);//-> orderBy('nombre','ASC')->paginate(10);


        //retorno la vista y le paso las canciones y el id de lista
        return view ('canciones.index',compact('canciones','lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lista)
    {
        return view('canciones.create',compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //recibo la nueva cancion y el id de la lista a la q pertenecera dicha cancion
    public function store(Request $request,$id)
    {

      //  dd($request);
        $cancion= new Cancion(
            request()->validate([
                   'nombre'=> ['required','min:3'],
                   'duracion'=> 'different:00:00:00',
                   'album'=> 'required','min:2',
                   'autor'=> 'required',
               ],Cancion::messages())
           );
        $lista_id= Lista::findOrfail($id)->id; 
   
        if($request->fecha_lanzamiento !=null)
            $cancion->fecha_lanzamiento= $request->fecha_lanzamiento;
   
        $cancion->lista_id= $lista_id;    
        $cancion->save();

        Flash::success("Cancion ".$cancion->nombre." ha sido creada con exito! ");

   return redirect('listas/'.$lista_id);
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
        //recibo ese objeto
        $cancion= Cancion::findOrFail($id);
        //y se lo paso a la vista           
        return view('canciones/edit',compact('cancion','id'));
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
        $cancion= Cancion::findOrFail($id);
      
        $cancion->update(request()->validate([
                           'nombre'=> ['required','min:3'],
                           'duracion'=> ['required'],
                           'album'=> ['required','min:2'],
                           'autor'=> 'required',
                           'fecha_lanzamiento' => 'min:1',
                      ],Cancion::messages()));
               
        Flash::success("Cancion ".$cancion->nombre." ha sido editada con exito! ");

         //Vuelvo al listado usando un get y muestro un mensaje flash
         return redirect('listas/'.$cancion->lista_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //recibo id de la cancion
    public function destroy($id)
    {
        $cancion= Cancion::findOrFail($id);
        $cancion->delete();

        Flash::success("Cancion ".$cancion->nombre." ha sido borrada con exito! ");
           //Vuelvo al listado usando un get 
        return redirect('listas/'.$cancion->lista_id);
    }
}
