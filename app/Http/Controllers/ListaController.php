<?php

namespace App\Http\Controllers;

use App\Lista;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ListaController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        //$this->middleware('book.privacy')->only('show');
        $this->middleware('book.privacy', ['only' => ['show', 'edit','index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas = Lista::all();

        $data['listas'] = $listas;

        return view('lista.show', $data);
    }

    public function indexAll($userid)
    {
       
        $lists = User::find($userid)->list()->get();

        $data['lists'] = $lists;

        return view('lista.indexAll', $data);
       
    }

     public function publicLists($userid)
    {

        $lists = User::find($userid)->list()->where('public_list', 1)->get();

        $data['lists'] = $lists;

        return view('lista.publicLists', $data);
       
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

        $lista->name = $request->name;
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
        $public_list = $lista->public_list;

        $data['name'] = $name;
        $data['books'] = $books;
        $data['is_public'] = $public_list;

        return view('lista.index', $data);
    }

    public function showAll()
    {
        $lista = Lista::all();

        return show($lista);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit($lista)
    {

        $list = Lista::find($lista);

        $data['list'] = $list;

        return view('lista.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lista)
    {
        $list = Lista::find($lista);

        $list->name = $request->name;
        $list->public_list = $request->public_list;
        $list->user_id = Auth::user()->id;

        if ($list->save()) {
            return redirect()->route('list.edit', ['id' => $list->id])->with('status', 'Éxito');
        }

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
