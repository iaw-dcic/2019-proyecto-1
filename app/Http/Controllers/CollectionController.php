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

        if(request('pp')=='publica')
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
        $coleccion = Collection::where('id', '=', $id)->first();
        $coleccion->delete();

        $id=auth()->user()->id;
        $collec = Collection::where('user_id', $id)->get();

        return view('editCollection', compact('collec'));
    }

    // public function update($id){
    //     $coleccion = Collection::where('id', '=', $id)->first();
  
    //     if (request('name') == '')
    //   {
    //       $coleccion->name = auth()->user()->name;
    //   }
    //   else
    //   {
    //       $coleccion->name = request('name');
    //   }
  
    //   if (request('city') == '')
    //   {
    //       $coleccion->ciudad = auth()->user()->ciudad;
    //   }
    //   else
    //   {
    //       $coleccion->ciudad = request('city');
    //   }
  
    //   if (request('bio') == '')
    //   {
    //       $coleccion->bio = auth()->user()->bio;
    //   }
    //   else
    //   {
    //       $coleccion->bio = request('bio');
    //   }
  
    //       $coleccion->save();

    //       $id=auth()->user()->id;
    //       $collec = Collection::where('user_id', $id)->get();
  
    //       return view('editCollection', compact('collec'));
    //   }
  
    
}
