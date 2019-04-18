<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class BooksControllers extends Controller
{
    public function index()
    {
        $books = Books::all();

        return view('welcome', compact('books'));
    }

    public function cargar()
    {
        return view('cargar');
    }

    public function store(){
       $book = new Books();
       $book ->title = request('title');
       $book ->category = request('category');
       $book ->description = request('description');

       $book->save();

       return redirect('/welcome');
    }
}
