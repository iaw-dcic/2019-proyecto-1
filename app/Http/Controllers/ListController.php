<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListModel;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller{

    public function showAll(){


        // $list = new ListModel();
        $lists = ListModel::where('user_id',Auth::user()->id)
                                ->orderBy('id', 'asc')
                                ->get();

        return view('listas.mis-listas')->with('lists', $lists);
    }

    public function create(Request $request){
        // The user must be first log in
        // validacion
        $validateData = $request->validate([
            'name' => 'required|unique:lists|max:255',
            'status' => 'required|max:255',
        ]);

        $list = new ListModel();

        $list->name = $request->input('name');
        $list->status = $request->input('status');
        $list->user_id = Auth::user()->id;

        $list->save();

        return redirect()->action('ListController@showAll');
    }

    public function eliminar(Request $request, $id){
        $lista = ListModel::where('id',$id)->first();

        if($lista && $lista['user_id'] == Auth::user()->id){
            $lista->delete();
        }

        return redirect()->action('ListController@showAll');
    }


}
