<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Book;


class NotRegisterController extends Controller
{
    public function loadCollection()
    {
        $collec = Collection::all();

        return view('welcome',compact('collec'));
    }

    public function loadBooks($id)
    {
        $books = Book::all();

        return view('loadbook', compact('books','id'));
    }
}
