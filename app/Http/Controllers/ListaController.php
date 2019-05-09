<?php 
namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use Auth;
use App\Articulo;
use App\Lista;
use DB;

class ListaController extends Controller
{
    
		 public function mis_listas(){
	        $user=Auth::user();  



          $listas=DB::table('lista')->where('user_id','=',$user->id)->get();
	        
	        $data = array('user' => Auth::user(),
                      'listas' => $listas);
        return view('mis_listas', $data);
    	}


    public function crear_lista(Request $request){

	        $user=Auth::user();
    		     if (!is_null($user))
            		return view('crear_lista');
         		else
            		return view('auth/login');

    }

    public function crear_lista_BD(Request $request){
       	$user=Auth::user();
   			       
        $lista= new Lista();

        $lista->user_id=$user->id;

        $name = $request->input('nombre');
             
        if(!is_null($name)){
            $lista->name=$name;
        }

        $descripcion = $request->input('descripcion');     
        $lista->descripcion=$descripcion;

       if(!strcmp($request->input('visibilidad'),'on')){
       			$visibilidad=('privada');
       	}else{
       			$visibilidad=('publica');		    
        }
        $lista->visibilidad=$visibilidad;
        

        
        $lista->save();        
        $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
        $data = array('user' => Auth::user(),
                      'listas' => $listas);

        return view('mis_listas', $data);


    }



     public function modificar_lista(Request $request){
  

        $user=Auth::user();
        $lista=DB::table('lista')->where('id','=',$request->id_lista)->first();

        if($lista->user_id==$user->id){

            $data = array('user' => Auth::user(),
                          'lista' => $lista);
            
            return view('modificar_lista', $data);
        }else{

            $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
            $data = array('user' => Auth::user(),
                      'listas' => $listas);

              return view('mis_listas', $data);
        }
     }

     public function modificar_lista_BD(Request $request){

            $user=Auth::user();
  
       
        //$articulo=DB::table('articulos')->where('id','=',$request->id_post)->first();
        //

              $lista= Lista::find($request->id_lista);


              if($lista->user_id==$user->id){ 
                      $name = $request->input('nombre');
                           
                      if(!is_null($name)){
                          $lista->name=$name;
                      }

                      $descripcion = $request->input('descripcion');     
                      $lista->descripcion=$descripcion;

                     if(!strcmp($request->input('visibilidad'),'on')){
                     			$visibilidad=('privada');
                     	}else{
                     			$visibilidad=('publica');		    
                      }
                      $lista->visibilidad=$visibilidad;

                      $lista->save();        

                      $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
                      $data = array('user' => Auth::user(),
                                    'listas' => $listas);

                      return view('mis_listas', $data);
            }else{

            $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
            $data = array('user' => Auth::user(),
                      'listas' => $listas);

              return view('mis_listas', $data);
        }

     } 

     public function eliminar_lista_BD(Request $request){
        $user=Auth::user();
        $lista= Lista::find($request->id_lista);
        if($lista->user_id==$user->id){
             $lista=DB::table('lista')->where('id','=',$request->id_lista)->delete();         
        }       
        $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
        $data = array('user' => Auth::user(),
                      'listas' => $listas);

        return view('mis_listas', $data); 
    }


   
}	




?>