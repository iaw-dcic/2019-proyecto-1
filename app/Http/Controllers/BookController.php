<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index($id)
    {
        $books = Book::where('collection_id', $id)->get();
        return view('cargarlibros', compact('books','id'));
    }


    public function store($id){
       $book = new Book();
       $book->title = request('title');
       $book->author = request('author');
       $book->collection_id = $id;

       $book->save();

       $books = Book::where('collection_id', $id)->get();
       
       return view('cargarlibros', compact('books','id'));
    }

    public function delete($id)
    {
        $book = Book::where('id', '=', $id)->first();
        $id2 = $book ->collection_id;

        $books = Book::where('id', '=', $id)->first();
        $books->delete();

$books = Book::where('collection_id', $id2)->get();
       
return view('cargarlibros', compact('books','id2'));
    }
}
