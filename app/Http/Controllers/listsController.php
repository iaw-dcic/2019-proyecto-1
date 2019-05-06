<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lista;


use Illuminate\Validation\Rule;

class listsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getMyLists()
    {
        $listas = Lista::where('user_id', auth()->id())->get();

        return view('Profile/myLists', compact('listas'));
    }

    public function createList()
    {
        return view('Profile/createList');
    }


    public function storeList()
    {
        request()->validate([
            'name' => ['required','min:3','max:25']
        ]);

        $lista = new Lista();
        $lista->name = request('name');
        $lista->user_id = auth()->id();
        

        if (request('public') != '') {
            $lista->public = 1;
        } else {
            $lista->public = 0;
        }

        $lista->save();

        return redirect('myLists');
    }

    public function showList(Lista $lista)
    {
        abort_if($lista->user_id != auth()->id(), 403, 'Nada para mostrar.');
        $goals = $lista->goals();

        return view('myList.show', compact('lista'));
    }

    public function editList(Lista $lista)
    {
        abort_if($lista->user_id != auth()->id(), 403, 'Nada para mostrar.');
        $goals = $lista->goals();

        return view('myList.edit', compact('lista'));
    }

    public function updateList(Lista $lista)
    {
        request()->validate([
            'name' => ['required','min:3','max:25']
        ]);
        if (request('name') != null)
            $lista->name = request('name');
        if (request('public') != '') {
            $lista->public = 1;
        } else {
            $lista->public = 0;
        }

        $lista->save();

        return redirect('/myLists');
    }

    public function destroyList(Lista $lista)
    {
        $lista->delete();
        return redirect('/myLists');
    }
}
