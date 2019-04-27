<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\Ingrediente_de_receta;
use App\User;
use App\Lista;
use Auth;
use Session;
use App\Http\Requests\RecetaRequest;
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
         'ingredientes' => Ingrediente_de_receta::all()
        
        ]);
}
public function recetasCategoria($categoria){
    $recetas = Receta::where('categoria',$categoria)->get();
    return view('recetas', [
        'recetas'=> $recetas,
         'ingredientes' => Ingrediente_de_receta::all()
        
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
public function agregarReceta( Request $request, $id){
    $nombre= $request->nombre;
    $categoria= $request->categoria;
    $descripcion= $request->descr;
    $pasos= $request->pasos;
   $lista= $request->lista;
    
    $receta=  Receta::create([
        'nombre' => $nombre,
        'descripcion' =>$descripcion,
        'pasos'=>  $pasos,
        'id_autor'=>$id,
        'lista_id'=>$lista,
        'categoria'=>$categoria
    ]);
     
     return back()->with('status',$nombre);
}
public function agregarIngrediente( Request $request, $nombreReceta){
   
    $medida_id=$request->medida;
    $ingrediente=$request->ingrediente;
    $cantidad=$request->cantidad;
    
    $receta=  ingrediente_de_receta::create([
        'receta_nombre' => $nombreReceta,
        'ingrediente_id' =>$ingrediente,
        'cantidad'=>  $cantidad,
        'medida_id' => $medida_id
    ]);
     
     return back()->with('msj','Ingrediente agregado');
}
public function agregarLista(Request $request, $id){
    $nombre= $request->nombre;
    $privacidad= $request->privacidad;
  
   Lista::create([
        'nombre' => $nombre,
        'usuario'=>$id,
        'public'=>$privacidad
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

public function busqueda(Request $request){
    $valor= $request->buscador;
    $receta = Receta::where('nombre', 'LIKE', "%{$valor}%")->get();
 
    
    
    $nombre= $receta[0]->nombre;
    $ingredientes= ingrediente_de_receta::where('receta_nombre',$nombre)->get();
    return redirect()->route('receta', [$nombre]);
}

public function listas(){
    $listas=Lista::all();
    return view('listas', [
        'listas'=>$listas
    ]);
}
}