<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lista;

class ListController extends Controller
{   
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$listas = Lista::where('user_id', auth()->id())->get();

    	return view('lista.lists', ['listas' => $listas]);
    }

    public function store(){
    	$lista = new Lista;

    	$lista->title = request('title');

        $lista->user_id = auth()->id();

    	$lista->save();

    	return redirect('/create');
    }

    public function show(Lista $list){

        return view('lista.show', compact('list'));

    }

    public function edit(Lista $list){

        return view('lista.edit', compact('list'));

    }

    public function update(Lista $list){
        $value = request('isPublic') == 'on' ? 1 : 0;

        $list->public = $value;
        $list->title = request('title');
        $list->save();
        return redirect('/lists');
    }

    public function destroy(Lista $list){
        $list->delete();

        return redirect('/lists');
    }

    public function create(){
        return view('lista.create');
    }
}
