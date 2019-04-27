<?php

namespace App\Http\Controllers;

use App\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{

    public function create($id)
    {
        return view('libros/add-libro',compact('id'));
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Genero' => 'required',
            'Titulo' => 'required',
            'Autor' => 'required',
            'FechaPublicacion' => 'required'
        ]);
        $libro = new Libro;
        $libro -> lista_libro_id = $id;
        $libro -> Genero = $request ->input('Genero');
        $libro -> Titulo = $request ->input('Titulo'); 
        $libro -> Autor = $request ->input('Autor');
        $libro -> Fecha_de_publicación = $request ->input('FechaPublicacion');
        $libro -> save();
    
        return redirect()->route('listaLibros');
    }

    public function edit(Request $request)
    {
        $libro = Libro::findOrFail($request->id_libro);
        $libro -> Titulo = $request->titulo;
        $libro -> Autor = $request->autor;
        $libro -> Genero = $request->genero;
        $libro -> save();
        return redirect()->route('listaLibros');
    }

    public function destroy(Request $request)
    {
        $libro = Libro::findOrFail($request->id_libro);
        $libro -> delete();
        return back();
    }
}
