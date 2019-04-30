<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\ingrediente_de_receta;
use App\User;
use App\Lista;
use Auth;
use Session;
use App\Http\Requests\RecetaRequest;
use App\ImageModel;
use Image;
use App\Ingrediente;
use App\Medida;
  class RecetasController extends Controller
{
   
    public function index(){
      
        $recetas = Receta::orderBy('nombre', 'ASC')->get();
        $usuarios = User::orderBy('nombre', 'ASC')->get(); 
        //$ingredientes = Ingrediente_deReceta::
        return view('home', [
            //'user' => $user,
            'title' => 'Inicio', 
            'recetas' => $recetas,
            'usuarios' => $usuarios
        ]);
    }
    public function cocineros(){
        $cocineros = User::all();
        return view('cocineros', ['cocineros'=> $cocineros]);
   }
   
   public function recetas(){
    $recetas = Receta::all();
    return view('recetas', [
        'recetas'=> $recetas,
         'ingredientes' => ingrediente_de_receta::all()
        
        ]);
}
public function recetasCategoria($categoria){
    $recetas = Receta::where('categoria',$categoria)->get();
    return view('recetas', [
        'recetas'=> $recetas,
         'ingredientes' => ingrediente_de_receta::all()
        
        ]);
}
public function receta($nombre){
    $receta= Receta::where('nombre',$nombre)->get();
    $ingredientes= ingrediente_de_receta::where('receta_nombre',$nombre)->get();
    return view('receta',[
        'receta'=> $receta,
        'ingredientes' =>$ingredientes
        ]);
}
public function agregarReceta(RecetaRequest $request, $id){


    $nombre= $request->nombre;
    $categoria= $request->categoria;
    $descripcion= $request->descr;
    $pasos= $request->pasos;
    $lista= $request->lista;
    
   $originalImage= $request->file('filename');
    if($originalImage!=null){
         $thumbnailImage = Image::make($originalImage);
         $originalPath = public_path().'/img/';
         $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
         $thumbnailImage->resize(150,150);
         $imagen='img/'.time().$originalImage->getClientOriginalName();
    }
    else{
        $imagen=null;
    }
   
    $receta=  Receta::create([
        'nombre' => $nombre,
        'descripcion' =>$descripcion,
        'pasos'=>  $pasos,
        'id_autor'=>$id,
        'lista_id'=>$lista,
        'categoria'=>$categoria,
        'imagen' =>$imagen
    ]);
     
     return back()->with('status',$nombre);
}
public function agregarIngrediente( Request $request, $nombreReceta){
   for($i=1 ; $i<=10; $i++){
    $medida_id=$request->get('medida'.$i);
    $ingrediente=$request->get('ingrediente'.$i);
    $cantidad=$request->get('cantidad'.$i);
   
    if($cantidad!=null && $ingrediente!=null && $medida_id != null){
    $receta=  ingrediente_de_receta::create([
        'receta_nombre' => $nombreReceta,
        'ingrediente_id' =>$ingrediente,
        'cantidad'=>  $cantidad,
        'medida_id' => $medida_id
    ]);}
    }
     return back()->with('msj','Ingrediente agregado');
}
public function agregarLista(Request $request, $id){
    $nombre= $request->nombre;
    $privacidad= $request->privacidad;
     
   Lista::create([
        'nombre' => $nombre,
        'usuario'=>$id,
        'privacidad'=>$privacidad
    ]);
    return back();
}

public function borrarReceta(Request $request, $nombre){
    $deleted = Receta::where('nombre', $nombre)->delete();
     
    return back();
}
public function borrarLista(Request $request, $id){
    $deleted = Lista::destroy($id);
     
    return back();
}
public function borrarIng(Request $request, $id){
    $deleted = ingrediente_de_receta::destroy($id);
     
    return back();
}
public function busqueda(Request $request){
    $valor= $request->buscador;
    $receta = Receta::where('nombre', 'LIKE', "%{$valor}%")->get();
    if($receta->isEmpty()){
    return redirect()->back()->with("errorReceta", "No se encontro ninguna receta con ese nombre");
     }
    else{
    $nombre= $receta[0]->nombre;
    $ingredientes= ingrediente_de_receta::where('receta_nombre',$nombre)->get();
    return redirect()->route('receta', [$nombre]);}
}

public function listas(){
    $listas= Lista::orderBy('nombre', 'ASC')->get();
    $recetas=Receta::orderBy('nombre', 'ASC')->get();
    return view('listas', [
        'listas'=>$listas,
        'recetas' =>$recetas
    ]);
}

public function compartir(Request $request,$id){
    $lista= Lista::find($id);
    $lista->privacidad= $request->privacidad;
    $lista->nombre= $request->nombre;
    $lista->save();
    return redirect()->back();
}
public function editar($nombre){
    $receta= Receta::where('nombre', $nombre)->get();
    $ingreceta= ingrediente_de_receta::where('receta_nombre',$nombre)->get();
    $ingredientes= Ingrediente::all();
    $medidas=Medida::all();
    return  view('editarReceta',[
        'receta' => $receta[0],
        'ingreceta' => $ingreceta,
        'ingredientes'=>$ingredientes,
        'medidas'=>$medidas
    ]);
}
public function actualizar(Request $request, $nombre){
    $recetas= Receta::where('nombre','=', $nombre)->get();
    $receta=$recetas[0];

    $nombreR= $request->nombre;
    $categoria= $request->categoria;
    $descripcion= $request->descr;
    $pasos= $request->pasos;
    $lista= $request->lista;
    
    
    if($request->filename !=null){
        $originalImage= $request->file('filename');
        $thumbnailImage = Image::make($originalImage);
        $originalPath = public_path().'/img/';
        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $imagen='img/'.time().$originalImage->getClientOriginalName();
        $receta->imagen=$imagen;
    }
    else{
       $j= Receta::where('nombre',$nombre)->get();
       $imagen= $j[0]->imagen;
    }
    Receta::where('nombre', $nombre)
    ->update([
        'nombre' => $nombreR,
        'descripcion' =>$descripcion,
        'pasos'=>  $pasos,
        'lista_id'=>$lista,
        'categoria'=>$categoria,
        'imagen' =>$imagen
        
        ]);

    //actualizar ingredientes
    for($i=1 ; $i<=10; $i++){
        $medida_id=$request->get('medida'.$i);
        $ingrediente=$request->get('ingrediente'.$i);
        $cantidad=$request->get('cantidad'.$i);
        $id= $request->id;
        if($cantidad!=null && $ingrediente!=null && $medida_id != null){
           $ing=ingrediente_de_receta::find($id);
             if($ing != null)   {     
                $ing->update([
                'ingrediente_id' =>$ingrediente,
                 'cantidad'=>  $cantidad,
                    'medida_id' => $medida_id ]);
             }
             else{
                ingrediente_de_receta::create([
                    'receta_nombre' => $nombre,
                    'ingrediente_id' =>$ingrediente,
                    'cantidad'=>  $cantidad,
                    'medida_id' => $medida_id
                ]);}
             }
        }
        
       return  $this->receta($nombre);
}
}