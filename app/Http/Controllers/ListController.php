<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lista;

use Illuminate\Validation\Rule;

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
        request()->validate([
            'title' => ['required', 'unique:listas', 'min:3', 'max:255']
        ]);

    	$lista = new Lista;

    	$lista->title = request('title');

        $lista->user_id = auth()->id();

    	$lista->save();

    	return redirect('/lists');
    }

    public function show(Lista $list){

        abort_if($list->user_id != auth()->id(), 403, 'Sorry, you are not authorized');

        return view('lista.show', compact('list'));

    }

    public function edit(Lista $list){

        abort_if($list->user_id != auth()->id(), 403, 'Sorry, you are not authorized');

        return view('lista.edit', compact('list'));

    }

    public function update(Lista $list){

        $myLists = Lista::where('user_id', auth()->id())->get();

        $titulos = $myLists->map(function ($list) {
            return collect($list->toArray())
                ->only(['title'])
                ->all();
        });

        $array = [];
        foreach ($titulos as $titulo) {
            if ($list->title != $titulo['title']){
                $array[] = $titulo['title'];
            }
        }

        request()->validate([
            'title' => ['required', Rule::notIn($array)]
        ]);

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
