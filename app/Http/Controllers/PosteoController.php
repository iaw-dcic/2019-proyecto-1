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
 


   public function eliminar_elemento_BD(Request $request){
         $user=Auth::user();


         $articulo=DB::table('articulos')->where('id','=',$request->id_post)->first();         
         $lista_id=$articulo->lista_id;
         $lista= Lista::find($lista_id);
         if($lista->user_id==$user->id){
                 $articulo=DB::table('articulos')->where('id','=',$request->id_post)->delete();

       
                  $articulos=DB::table('articulos')->where('lista_id','=',$lista_id)->orderBy('created_at','desc')->get();
                  $data = array('user' => Auth::user(),
                                'articulos' => $articulos);
                  return view('mis_post', $data);
        }else{
          $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
          $data = array('user' => Auth::user(),
                        'listas' => $listas);

          return view('mis_listas', $data); 
         } 
    }

     public function modificar_elemento(Request $request){
  

        $user=Auth::user();
        $articulos=DB::table('articulos')->where('id','=',$request->id_post)->first();
         $lista_id=$articulos->lista_id;
         $lista= Lista::find($lista_id);
         if($lista->user_id==$user->id){
              $data = array('user' => Auth::user(),
                            'articulos' => $articulos);
              
              return view('modificar_elemento', $data);
          }else{
              $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
              $data = array('user' => Auth::user(),
                            'listas' => $listas);

              return view('mis_listas', $data); 
         }     

     }

     public function modificar_elemento_BD(Request $request){

            $user=Auth::user();
  
       
        //$articulo=DB::table('articulos')->where('id','=',$request->id_post)->first();
         $articulo= Articulo::find($request->id_post);
         $lista_id=$articulo->lista_id;
         $lista= Lista::find($lista_id);
         if($lista->user_id==$user->id){
                

                $name = $request->input('nombre');
                     
                if(!is_null($name)){
                    $articulo->nombre=$name;
                }

                $descripcion = $request->input('descripcion');     
                $articulo->descripcion=$descripcion;


                $puntaje = $request->input('puntaje');     
                $articulo->puntaje=$puntaje;


                $articulo->save();        

                $articulos=DB::table('articulos')->where('lista_id','=',$articulo->lista_id)->orderBy('created_at','desc')->get();
                $data = array('user' => Auth::user(),
                              'articulos' => $articulos);

                return view('mis_post', $data);
            }else{
              $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
              $data = array('user' => Auth::user(),
                            'listas' => $listas);

              return view('mis_listas', $data); 
         }     



         

     } 


     


      public function ver_elementos(Request $request){
        $user=Auth::user();
        $lista=DB::table('lista')->where('id','=',$request->id_lista)->first();
        if($lista->user_id==$user->id){
            $articulos=DB::table('articulos')->where('lista_id','=',$request->id_lista)->orderBy('created_at','desc')->get();



            $data = array('user' => Auth::user(),
                          'articulos' => $articulos);
           
            return view('mis_post', $data);
         }else{
              $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
              $data = array('user' => Auth::user(),
                            'listas' => $listas);

              return view('mis_listas', $data); 
         }    
    }

     public  function agregar_elemento(Request $request) {
        $user=Auth::user();
         $lista=DB::table('lista')->where('id','=',$request->id_lista)->first();
          if($lista->user_id==$user->id){
              $data = array('user' => Auth::user(),
                          'lista' => $lista);
            return view('agregar_elemento', $data);
         }else{
              $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
              $data = array('user' => Auth::user(),
                            'listas' => $listas);

              return view('mis_listas', $data); 
         }    
    }



     public function agregar_elemento_BD(Request $request){
        $user=Auth::user(); 
         $lista= Lista::find($request->id_lista);
         if($lista->user_id==$user->id){
                $articulo= new Articulo();

                $name = $request->input('nombre');
                     
                if(!is_null($name)){
                    $articulo->nombre=$name;
                }

                $descripcion = $request->input('descripcion');     
                $articulo->descripcion=$descripcion;

                
                $puntaje = $request->input('puntaje');     
                $articulo->puntaje=$puntaje;

         
                //$lista=DB::table('lista')->where('id','=',$request->id)->first();
                
                $articulo->lista_id= $request->id_lista;

                $articulo->save();        
                $articulos=DB::table('articulos')->where('lista_id','=',$request->id_lista)->orderBy('created_at','desc')->get();
                $data = array('user' => Auth::user(),
                              'articulos' => $articulos);

                return view('mis_post', $data);
           }else{
              $listas=DB::table('lista')->where('user_id','=',$user->id)->orderBy('created_at','desc')->get();
              $data = array('user' => Auth::user(),
                            'listas' => $listas);

              return view('mis_listas', $data); 
         }         

    }










}
