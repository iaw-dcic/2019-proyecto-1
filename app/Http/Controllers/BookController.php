<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Collectionbook;

class BookController extends Controller
{
    public function index($id)
    {
        $books = Book::all();

        return view('cargarlibros', compact('books','id'));
    }


    public function store($id){
       $book = new Book();
       $book ->title = request('title');
       $book ->category = request('category');
       $book ->description = request('description');

       $book->save();

       $cb = new Collectionbook();
       $cb -> id_book = 2;
       $cb -> id_collection = 4;
       $cb -> save();

       $books = Book::all();
    
       return view('cargarlibros', compact('books','id'));
    }

    public function destroy(){
        
    }
}
