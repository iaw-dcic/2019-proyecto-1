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
    $articulos=DB::table('articulos')->orderBy('created_at','desc')->get();

   
        return view('main')->with('articulos', $articulos);
        //return view('main',[$articulos]);
    }

    public function buscar(Request $request){

         $id_c= $request->categoria;
             $categoria=DB::table('categorias')->where('name','=',$id_c)->orderBy('created_at','desc')->first(); 
         //dd($categoria);    
        if($categoria){
        $articulos=DB::table('articulos')->where('categoria_id', '=',$categoria->id) ->orderBy('created_at','desc')->get();
          return view('main')->with('articulos', $articulos);
        }
        else
            return  view('main')->with('articulos',null);
    }


}
