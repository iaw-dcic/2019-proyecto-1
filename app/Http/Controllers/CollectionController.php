<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Book;

class CollectionController extends Controller
{
    public function index()
    {
        $collec = Collection::all();

        return view('home', compact('collec'));
    }

    public function store()
    {
        $colecc = new Collection();
        $colecc->title = request('title');
        $colecc->category = request('category');
        $colecc->description = request('description');
        $colecc->save();

        $collec = Collection::all();

        return view('editCollection', compact('collec'));
    }

    public function load()
    {
        $collec = Collection::all();

        return view('editCollection', compact('collec'));
    }

    public function eliminar($id)
    {
        return view('delete', compact('id'));
    }

    public function delete($id)
    {
        $libros = Book::where('id_collection', '=', $id);

        $libros->delete();

        $coleccion = Collection::where('id', '=', $id)->first();

        $coleccion->delete();

        $collec = Collection::all();

        return view('editCollection', compact('collec'));
    }
}
