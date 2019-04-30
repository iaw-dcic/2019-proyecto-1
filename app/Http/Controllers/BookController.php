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
        return view('cargarlibros', compact('books', 'id'));
    }


    public function store($id)
    {
        $book = new Book();
        $book->title = request('title');
        $book->author = request('author');
        $book->editorial = request('editorial');
        $book->pag = request('pag');
        $book->collection_id = $id;

        $book->save();

        $books = Book::where('collection_id', $id)->get();

        return view('cargarlibros', compact('books', 'id'));
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $id2 = $book->collection_id;

        //$books = Book::where('id', '=', $id2)->first();
        $book->delete();

       
        $books = Book::where('collection_id', $id2)->get();

       return view('cargarlibros', compact('books', 'id2'));

    }

    public function destroy(Request $request)
    {
        $libro = Book::findOrFail($request->id);
        $libro -> delete();
        return back();
    }
}
