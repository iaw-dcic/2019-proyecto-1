<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;


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
     
    //     $this->validate(request(), [
    //         'titulo' => 'required|max:255',
    //       'categoria' => 'required',
    //       'descrip' => 'required',
    //   ]);

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

    public function update($id){
        $coleccion = Collection::find($id);
  
        if (request('titulo') == '')
      {
       
      }
      else
      {
          $coleccion->title = request('titulo');
      }
      if (request('categoria') == '')
      {
         
      }
      else
      {
          $coleccion->category = request('categoria');
      }

      if (request('descrip') == '')
      {
         
      }
      else
      {
          $coleccion->description = request('descrip');
      }

    
      if (request('pp') == 'publica')
      {
        $coleccion->pp=1;
      }
      else
      {
        $coleccion->pp=0;
      }

      
          $coleccion->save();

          $collec = Collection::find($id);
  
          return view('edit', compact('collec','id'));
      }

      public function loadcollection($id){
        $collec = Collection::find($id);
  
        return view('edit', compact('collec','id'));
      }
  
    
}
