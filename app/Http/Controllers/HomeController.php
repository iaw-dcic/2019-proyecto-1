<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

  /*  public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
           
    /* $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);       
     */
    $listas=DB::table('lista')->orderBy('created_at','desc')->get();

   
        return view('main')->with('listas', $listas);
        //return view('main',[$articulos]);
    }
/*
    public function buscar(Request $request){

         $id_l= $request->lista;
             $lista=DB::table('lista')->where('name','=',$id_l)->orderBy('created_at','desc')->first(); 
         //dd($categoria);    
        if($lista){
        $articulos=DB::table('articulos')->where('lista_id', '=',$lista->id) ->orderBy('created_at','desc')->get();
          return view('main')->with('articulos', $articulos);
        }
        else
            return  view('main')->with('articulos',null);
    }
*/
    public function ver_lista(Request $request){
       
        $lista=DB::table('lista')->where('id','=',$request->id_lista)->first();
        $articulos=DB::table('articulos')->where('lista_id','=',$lista->id)->orderBy('created_at','desc')->get();
       $data = array('articulos' => $articulos);
        return view('ver_lista', $data);
    }
     public function ver_perfil(Request $request){
       
        $usuario=DB::table('users')->where('id','=',$request->usuario)->first(); 
               
       $data = array('usuario' => $usuario);
        return view('ver_perfil', $data);
    }

}
