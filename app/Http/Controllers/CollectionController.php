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

    public function store(){
        $colecc = new Collection();
        $colecc ->title = request('title');
        $colecc ->description = request('description');
        $colecc->save();
 
        $collec = Collection::all();

        return view('home',compact('collec'));
     }

}
