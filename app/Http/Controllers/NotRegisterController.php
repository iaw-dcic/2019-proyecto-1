<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Book;


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

        return view('loadbook', compact('books','id'));
    }
}
