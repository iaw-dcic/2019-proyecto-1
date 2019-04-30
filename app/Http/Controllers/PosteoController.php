<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use Auth;
use App\Articulo;
use App\Categoria;
use DB;
class PosteoController extends Controller
{
    
  //
    public  function postear () {
        $user=Auth::user();
         if (!is_null($user))
            return view('postear');
         else
            return view('auth/login');

    }

    public function crear_post(Request $request){
    	$user=Auth::user();
    //    dd($request->all());
      /** 
        if($request->hasFile('archivo')){
    		$archivo=$request->file('archivo);
    		$filename=time() . '.' . $archivo->getClientOriginalExtension();
    		Image::make($archivo)->resize(250,250)->save(public_path('/uploads/imagenes/'.$filename));
    		
    		$user->avatar=$filename;
    		
    	}
        **/
     
     //  Articulo::create();
       
        $articulo= new Articulo();

        $name = $request->input('nombre');
             
        if(!is_null($name)){
            $articulo->nombre=$name;
        }

        $descripcion = $request->input('descripcion');     
        $articulo->descripcion=$descripcion;


        if(!is_null($user)){
            $articulo->user_id= $user->id;
        }

        $name=$request->input('categoria');
        $categoria=DB::table('categorias')->where('name','=',$name)->orderBy('created_at','desc')->first();
        if(!$categoria){
                $categoria= new Categoria();        
                $categoria->name=$name;
                $categoria->save();
        }

        $articulo->categoria_id= $categoria->id;
        $articulo->save();        
        $articulos=DB::table('articulos')->orderBy('created_at','desc')->get();
        $data = array('user' => Auth::user(),
                      'articulos' => $articulos);

        return view('main', $data);

    }

}
