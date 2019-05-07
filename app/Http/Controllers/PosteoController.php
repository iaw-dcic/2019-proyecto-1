<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use Auth;
use App\Articulo;
use App\Lista;
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

        $visibilidad = $request->input('visibilidad');     
        $articulo->visibilidad=$visibilidad;

        $puntaje = $request->input('puntaje');     
        $articulo->puntaje=$puntaje;

 /*
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
        */
        $lista=DB::table('lista')->where('user_id','=',$user->id)->first();
        
        if(!$lista){
            $lista=new Lista();
            $lista->name='Documentales';
            $lista->user_id= $user->id;
            $lista->save();
        } 
        $articulo->lista_id= $lista->id;

        $articulo->save();        
        $articulos=DB::table('articulos')->orderBy('created_at','desc')->get();
        $data = array('user' => Auth::user(),
                      'articulos' => $articulos);

        return view('main', $data);

    }


    public function mis_post(){
        $user=Auth::user();
        $lista=DB::table('lista')->where('user_id','=',$user->id)->first();
        $articulos=DB::table('articulos')->where('lista_id','=',$lista->id)->orderBy('created_at','desc')->get();
        $data = array('user' => Auth::user(),
                      'articulos' => $articulos);
        return view('mis_post', $data);
    }

   public function eliminar_post(Request $request){
         $articulos=DB::table('articulos')->where('id','=',$request->id_post)->delete();         
         
         $user=Auth::user();
        $lista=DB::table('lista')->where('user_id','=',$user->id)->first();
        $articulos=DB::table('articulos')->where('lista_id','=',$lista->id)->orderBy('created_at','desc')->get();
        $data = array('user' => Auth::user(),
                      'articulos' => $articulos);
        return view('mis_post', $data);
    }

     public function modificar_post(Request $request){
  

        $user=Auth::user();
        $articulos=DB::table('articulos')->where('id','=',$request->id_post)->first();
        $data = array('user' => Auth::user(),
                      'articulos' => $articulos);
        
        return view('modificar', $data);


     }

     public function modificar(Request $request){

            $user=Auth::user();
  
       
        //$articulo=DB::table('articulos')->where('id','=',$request->id_post)->first();
        //

        $articulo= Articulo::find($request->id_post);

        $name = $request->input('nombre');
             
        if(!is_null($name)){
            $articulo->nombre=$name;
        }

        $descripcion = $request->input('descripcion');     
        $articulo->descripcion=$descripcion;

        $visibilidad = $request->input('visibilidad');     
        $articulo->visibilidad=$visibilidad;

        $puntaje = $request->input('puntaje');     
        $articulo->puntaje=$puntaje;


        $articulo->save();        

        $articulos=DB::table('articulos')->orderBy('created_at','desc')->get();
        $data = array('user' => Auth::user(),
                      'articulos' => $articulos);

        return view('mis_post', $data);




         

     }   
}
