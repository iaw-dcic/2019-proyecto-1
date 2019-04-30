<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lista;
use Auth;
use App\User;
use App\goal;

class listsController extends Controller
{
    public function getMyLists()
    {
        $user = Auth::user();
        $listas = lista::where('user_id', $user->id)->get();
        return view('Profile/myLists', compact('listas'));
    }

    public function createList()
    {
        return view('Profile/createList');
    }



    public function storeList()
    {
        $user = Auth::user();

        $lista = new Lista();

        request()->validate([
            'name' => ['required','min:3','max:25']
        ]);

        $lista->name = request('name');
        $lista->user_id = $user->id;
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
        $goals = goal::where('lista_id', $lista->id)->get();
        return view('myList.show', compact('lista', 'goals'));
    }

    public function editList(Lista $lista)
    {
        $goals = goal::where('lista_id', $lista->id)->get();
        return view('myList.edit', compact('lista', 'goals'));
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
        $goals = goal::where('lista_id', $lista->id)->get();
        foreach ($goals as $goal)
            $goal->delete();
        $lista->delete();

        return redirect('/myLists');
    }
}
