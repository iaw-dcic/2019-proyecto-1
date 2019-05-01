<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListModel;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\json_encode;

class ListController extends Controller{


    public function show(ListModel $list){
        if($list['user_id'] == Auth::user()->id){
            $books = Book::where('list_id', $list['id'])
                            ->orderBy('id', 'desc')
                            ->get();
            return view('listas.show', ['list_name' => $list['name'], 'list_id' => $list['id']])->with('books', $books);
        }
        else{
            abort(404);
        }
    }

    public function showAll(){
        // $list = new ListModel();
        $lists = ListModel::where('user_id',Auth::user()->id)
                                ->orderBy('id', 'desc')
                                ->get();
        return view('listas.mis-listas')->with('lists', $lists);
    }

    public function create(Request $request){
        // The user must be first log in
        // validacion
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        $list = new ListModel();

        $list->name = $request->input('name');
        $list->status = $request->input('status');
        $list->user_id = Auth::user()->id;

        $list->save();
        $request->session()->flash('success', 'Lista creada!');
        return redirect()->action('ListController@showAll');
    }

    // Show the form for editing the specified resource.
    public function edit(ListModel $list){
        // valido que la lista sea del usuario logeado
        if($list['user_id'] == Auth::user()->id){
            return view('listas.editar')->with('list', $list);
        }
        else{
            abort(404);
        }
    }

    // Update the specified resource in storage.
    public function update(Request $request, ListModel $list){
        // The user must be first log in
        // validacion
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        // valido que la lista sea del usuario logeado
        if($list['user_id'] == Auth::user()->id){
            $list->name = $request->input('name');
            $list->status = $request->input('status');
            $list->save();

            $request->session()->flash('success', 'Lista actualizada!');
        }
        else{
            $request->session()->flash('error', 'La lista no pertenece al usuario autenticado');
        }
        return redirect()->action('ListController@showAll');
    }

    public function eliminar(Request $request, ListModel $list){

        if($list['user_id'] == Auth::user()->id){
            $list->delete();
            $request->session()->flash('success', 'Lista eliminada!');
        }
        else{
            $request->session()->flash('error', 'La lista no pertenece al usuario autenticado');
        }
        return redirect()->action('ListController@showAll');

    }

    public function updateStatus(ListModel $list){
        if($list->status == 'Publica'){
            $list->status = 'Privada';
        }
        else{
            $list->status = 'Publica';
        }
        $list->save();
        return redirect()->action('ListController@showAll');

    }



}
