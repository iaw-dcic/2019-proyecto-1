<?php

namespace App\Http\Controllers;

use App\Article;
use App\Inventory;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$inventories = Inventory::all();
        dd('este es el index de articles');
        //return view('inventories.index',compact('inventories'));
    }

    public function create(Inventory $inventory)
    {

        return view('articles.create',compact('inventory'));
    }
    
    public function store(Inventory $inventory)
    {
        
        Article::create([
            'user_id' =>Auth::user()->id,
            'estado' => request('estado'),
            'title' => request('title'),
            'fabricationYear' => request('fabricationYear'),
            'inventory_id'=> $inventory->id,
            ]
        );
        return view('inventories.show',compact('inventory'));
    }

    public function show(Article $article)
    {     
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article)
    {
        $atributes = request()->validate([
            'title'=> ['required','string'],
            'fabricationYear' => ['required','integer','min:1870','max:2019'],
            'estado' => ['required'],
        ]);
        $article->update($atributes);
        $article->save();

        return redirect('/inventories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/inventories');
    }
}
