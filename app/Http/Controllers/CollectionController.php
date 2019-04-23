<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

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

        // Conseguimos el objeto
        $coleccion = Collection::where('id_collection', '=', $id)->first();

        // Lo eliminamos de la base de datos
        $coleccion->delete();


     //   $collec = Collection::find($id);

       // $collec->delete($collec->id_collection);

        return redirect()->load();
    }
}
