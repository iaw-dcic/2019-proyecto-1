<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Book;

class CollectionController extends Controller
{
    public function index()
    {
        $id=auth()->user()->id;
        $collec = Collection::where('user_id', $id)->get();

        return view('home', compact('collec','id'));
    }

    public function store()
    {
        $colecc = new Collection();
        $colecc->title = request('title');
        $colecc->category = request('category');
        $colecc->description = request('description');
        $colecc->user_id = auth()->user()->id;
        $colecc->pp=0;  //coleccion privada

        if(request('description')=='Publica')
            $colecc->pp=1;  //coleccion publica
        
        $colecc->save();

        $id=auth()->user()->id;
        $collec = Collection::where('user_id', $id)->get();

        return view('editCollection', compact('collec'));
    }

    public function load()
    {
        $id=auth()->user()->id;
        $collec = Collection::where('user_id', $id)->get();

        return view('editCollection', compact('collec'));
    }

    public function delete($id)
    {
  //      $books = Book::where('collection_id', $id)->get();
//$books = Book::all();
  
//$books->delete();

        $coleccion = Collection::where('id', '=', $id)->first();
        $coleccion->delete();

        $id=auth()->user()->id;
        $collec = Collection::where('user_id', $id)->get();

        return view('editCollection', compact('collec'));
    }
}
