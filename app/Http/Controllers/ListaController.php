<?php

namespace App\Http\Controllers;

use App\Lista;
use Illuminate\Http\Request;
use Auth;

class ListaController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        $this->middleware('book.privacy')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lista = Lista::all();

        return $lista;
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('lista.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lista = New Lista();

        $lista->name=$request->name;
        //$lista->description=$request->description;
        $lista->user_id = Auth::user()->id;

        if ($lista->save()) {
            return redirect()->route('list.create')->with('status', 'Éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show($lista)
    {
        $lista = Lista::find($lista);
        $name = $lista->name;
        $books = $lista->book;

        $data['name'] = $name;
        $data['books'] = $books;

        return view('lista.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(lista $lista)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lista $lista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(lista $lista)
    {
        //
    }
}
