<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    public function index($id)
    {
        $books = Book::where('collection_id', $id)->get();
        return view('/Book/loadBooks', compact('books', 'id'));
    }


    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'editorial' => 'required',
            'pag' => 'required'
        ]);

        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->editorial = $request->input('editorial');
        $book->pag = $request->input('pag');
        $book->collection_id = $id;
        $book->save();

        $books = Book::where('collection_id', $id)->get();

        return view('/Book/loadBooks', compact('books', 'id'));
    }

    public function load2($id)
    {
        $book = Book::find($id);
        return view('/Book/deleteBook', compact('book','id'));
    }

    public function delete($id)
    {
        $bk = Book::find($id);
        $id = $bk->collection_id;

        $bk->delete();

        $books = Book::where('collection_id', $id)->get();
        return view('/Book/loadBooks', compact('books', 'id'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if ($request->input('title') == '') { } else {
            $book->title = $request->input('title');
        }
        if ($request->input('author') == '') { } else {
            $book->author = $request->input('author');
        }
        if ($request->input('editorial') == '') { } else {
            $book->editorial = $request->input('editorial');
        }
        if ($request->input('pag') == '') { } else {
            $book->pag = $request->input('pag');
        }

        $book->save();

        $bk = Book::where('id', $id)->get();
        $id = $book->collection_id;
        $books = Book::where('collection_id', $id)->get();

        return view('/Book/loadBooks', compact('books', 'id'));
    }

    public function load($id)
    {
        $book = Book::find($id);
        return view('/Book/editBook', compact('book','id'));
    }
}
