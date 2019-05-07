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
        //return $request;
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
        $pelicula = Pelicula::where(['titulo' => $titulo, 'user_id' => Auth::user()->id])->get()->first();
        //$publico=DB::select ('select publico from peliculas where pelicula =:titulo and id =:id',['titulo'=>$titulo,'id'=> Auth::id(),]);
        
        $pelicula->publico = !($pelicula->publico);
        $pelicula->save();
        /*if($pelicula->publico==0)
            $caters = DB::select('update peliculas Set publico = :dat where id = :id and pelicula = :titulo', ['dat' => true,'titulo'=>$titulo,'id'=> Auth::id()]);
        $
        else
             $caters = DB::select('update peliculas Set publico = :dat where id = :id and pelicula = :titulo', ['dat' => false,'titulo'=>$titulo,'id'=> Auth::id()]);
       */
         return redirect('PelitecaEditor');
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
    public function destroy($nom,$gen)
    {
        $pelicula = Pelicula::where(['pelicula'=>$nom,'genero'=>$gen])->get()->first();
        $pelicula->delete();
        /*
        $caters = DB::select('delete from peliculas where genero=:gen and pelicula=:nom', ['nom' => $nom,'gen'=>$gen]);      
        */

        return redirect('PelitecaEditor');
    }
}
