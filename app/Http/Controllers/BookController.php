<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id){
        // validacion
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|max:255',
        ]);

        $book = new Book();

        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->year = $request->input('year');
        $book->list_id = $id;
        echo $book;
        $book->save();
        return redirect()->action('ListController@show', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Book $book)
    {
        //
        $book->delete();

        return redirect()->action('ListController@show', $id);
    }
}
