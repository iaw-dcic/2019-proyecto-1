<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lista;

class ListController extends Controller
{
    public function index(){
    	$listas = Lista::all();

    	return view('lists', ['listas' => $listas]);
    }

    public function store(){
    	$lista = new Lista;

    	$lista->title = request('title');

    	$lista->save();

    	return redirect('/create');
    }

    public function show(Lista $list){

        return view('show', compact('list'));

    }

    public function edit(Lista $list){

        return view('edit', compact('list'));

    }

    public function update(Lista $list){
        $list->title = request('title');
        $list->save();
        return redirect('/lists');
    }

    public function destroy(Lista $list){
        $list->delete();

        return redirect('/lists');
    }

    public function create(){
        return view('create');
    }
}
