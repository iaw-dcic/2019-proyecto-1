<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;
use App\User;
use App\Libro;

class LibrosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function create($id)
    {

        return view('libro.create')->with('usr',auth()->user()->name)->with('lista',Lista::find($id));	
    }

      public function store(Request $request,$id)
    {
        $request->validate([
            'nombre' => ['required','min:3','max:20'],
            'autor' => ['required','min:3','max:20'],
            'genero' => ['required','min:3','max:20']            
        ]);


        abort_if(Lista::find($id)->user_id != auth()->id(),403,'permiso denegado');
        $new_libro= new Libro();
        $new_libro->nombre=$request->nombre;
        $new_libro->autor=$request->autor;
        $new_libro->genero=$request->genero;
        $new_libro->lista_id=$id;

        $new_libro->user_id=auth()->id();
        $new_libro->save();
        return redirect()->route('listas.show',$id);
    }


    public function edit($id)
    {
        return view('libro.edit')->with('usr',auth()->user()->name)->with('libro',Libro::find($id));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'nombre' => ['required','min:3','max:20'],
            'autor' => ['required','min:3','max:20'],
            'genero' => ['required','min:3','max:20']            
        ]);
        abort_if(Libro::find($id)->user_id != auth()->id(),403,'permiso denegado');

        $libro= Libro::find($id);
        $libro->nombre=$request->nombre;
        $libro->autor=$request->autor;
        $libro->genero=$request->genero;

        $libro->save();
         return redirect()->route('listas.show',$libro->lista->id);
    }

    public function destroy($id)
    {
        abort_if(Libro::find($id)->user_id != auth()->id(),403,'permiso denegado');

        
        $libro=Libro::find($id);
        $lista=$libro->lista;
        $libro->delete();
        
        return redirect()->route('listas.show',$lista->id);
       
    }
}
