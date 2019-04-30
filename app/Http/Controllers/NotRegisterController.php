<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Book;
use App\User;


class NotRegisterController extends Controller
{
    public function loadCollection()
    {
        $collec = Collection::where('pp', 1)->get();
        return view('welcome',compact('collec'));
    }

    public function loadBooks($id)
    {
        $books = Book::where('collection_id', $id)->get();
        $collec = Collection::find($id);
        return view('loadbook', compact('books','collec'));
    }

    public function profile($id)
    {
        $perfil = User::find($id);
        $listasPublicas = Collection::where(['user_id' => $id, 'pp' => 1])->get();
        return view('profile', compact('perfil','listasPublicas'));
    }
}
