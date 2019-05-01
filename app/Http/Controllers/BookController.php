<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\ListModel;
use Illuminate\Support\Facades\Auth;

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(ListModel $list, Book $book)
    {
        //
        return view('libros.editar', ['list_id' => $list['id']])->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListModel $list, Book $book)
    {
        // The user must be first log in
        // validacion
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|max:255',
        ]);

        // valido que la lista sea del usuario logeado
        if($list['user_id'] == Auth::user()->id){
            $book->name = $request->input('name');
            $book->author = $request->input('author');
            $book->year = $request->input('year');
            $book->save();

            $request->session()->flash('success', 'Lista actualizada!');
        }
        else{
            $request->session()->flash('error', 'La lista no pertenece al usuario autenticado');
        }
        return redirect()->action('ListController@show', $list['id']);
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
