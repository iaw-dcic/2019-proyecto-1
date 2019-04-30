<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;


class CollectionController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $collec = Collection::where('user_id', $id)->get();

        return view('home', compact('collec', 'id'));
    }

    public function store()
    {
        // $validatedData = $request->validate([
        //     'title' => 'required',
        //     'cateogry' => 'required',
        //     'description' => 'required',
        // ]);

        // $colecc = new Collection();
        // $colecc->title = $request->input('title');
        // $colecc->category = $request->input('category');
        // $colecc->description = $request->input('description');
        // $colecc->user_id = auth()->user()->id;
        // $colecc->pp=0;  //coleccion privada

        // if($request->input('pp')=='publica')
        //     $colecc->pp=1;  //coleccion publica

        // $colecc->save();

        //--------------------------------------------

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
        $colecc->pp = 0;  //coleccion privada

        if (request('pp') == 'publica')
            $colecc->pp = 1;  //coleccion publica

        $colecc->save();

        $id = auth()->user()->id;
        $collec = Collection::where('user_id', $id)->get();

        return view('/Collection/editCollection', compact('collec'));
    }

    public function load()
    {
        $id = auth()->user()->id;
        $collec = Collection::where('user_id', $id)->get();

        return view('/Collection/editCollection', compact('collec'));
    }

    public function delete($id)
    {
        $coleccion = Collection::where('id', '=', $id);
        $coleccion->delete();

        $id = auth()->user()->id;
        $collec = Collection::where('user_id', $id)->get();

        return view('/Collection/editCollection', compact('collec'));
    }

    public function update(Request $request, $id)
    {
        $coleccion = Collection::find($id);

        if ($request->input('titulo') == '') { } else {
            $coleccion->title = $request->input('titulo');
        }
        if ($request->input('categoria') == '') { } else {
            $coleccion->category = $request->input('categoria');
        }
        if ($request->input('descrip') == '') { } else {
            $coleccion->description = $request->input('descrip');
        }

        if ($request->input('pp') == 'publica') {
            $coleccion->pp = 1;
        } else {
            $coleccion->pp = 0;
        }


        $coleccion->save();

        $collec = Collection::find($id);

        return view('/Collection/edit', compact('collec', 'id'));
    }

    public function loadcollection($id)
    {
        $collec = Collection::find($id);

        return view('/Collection/edit', compact('collec', 'id'));
    }
}
