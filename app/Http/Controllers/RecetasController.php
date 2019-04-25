<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\Ingrediente_de_receta;
use App\User;
use App\Lista;
use Auth;
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
    return view('receta',[
        'receta'=> $receta]);
}
public function agregarReceta(Request $request, $id){
    $nombre= $request->nombre;
    $categoria= $request->categoria;
    $descripcion= $request->descr;
    $pasos= $request->pasos;
   $lista= $request->input("lista");
    
    $receta=  Receta::create([
        'nombre' => $nombre,
        'descripcion' =>$descripcion,
        'pasos'=>  $pasos,
        'id_autor'=>$id,
        'lista_id'=>$lista,
        'categoria'=>$categoria
    ]);
   
 return back()->with('status','Datos cargados correctamente');
}
public function agregarLista(Request $request, $id){
    $nombre= $request->nombre;
     
  
   Lista::create([
        'nombre' => $nombre,
        'usuario'=>$id
    ]);
    return back()->with('status','Datos cargados correctamente');
}

public function borrarReceta(Request $request, $nombre){
    $deleted = Receta::where('nombre', $nombre)->delete();
     
    return back();
}
public function borrarLista(Request $request, $id){
    $deleted = Lista::destroy($id);
     
    return back();
}
}
