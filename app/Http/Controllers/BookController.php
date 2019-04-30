<?php

namespace App\Http\Controllers;

use App\Book;
use App\Lista;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('user_id', Auth::user()->id)->get();

        $data['books'] = $books;

        return view('book.index', $data);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $lists = Auth::user()->list()->get();

        if($lists) {
            $data['lists'] = $lists;
        } else {
            $data['lists'] = [];
        }


        return view('book.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book = New Book();

        $book->name=$request->name;
        $book->author=$request->author;
        $book->isbn=$request->isbn;
        $book->user_id = Auth::user()->id;
        $book->list_id=$request->list_id;

        if ($book->save()) {
            return redirect()->route('book.create')->with('status', 'Éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($libro)
    {
        $book = Book::find($libro);

        $lists = Auth::user()->list()->get();

        $data['lists'] = $lists;
        $data['book'] = $book;

        return view('book.edit', $data);
        //return $lists;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book = Book::find($book)->first();

        $book->name=$request->name;
        $book->author=$request->author;
        $book->isbn=$request->isbn;
        $book->list_id=$request->list_id;

        if ($book->save()) {
           // return redirect()->route('book.update')->with('status', 'Éxito');
            return redirect()->route('book.edit', ['id' => $book->id])->with('status', 'Éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        Book::where('id', $book)->delete();

        return redirect()->route('book.index');
    }
}
