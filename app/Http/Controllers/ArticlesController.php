<?php

namespace App\Http\Controllers;

use App\Article;
use App\Inventory;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;    
use Illuminate\Support\Facades\Session;

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
        //dd('este es el index de articles');
        //return view('inventories.index',compact('inventories'));
    }

    public function create(Inventory $inventory)
    {

        return view('articles.create',compact('inventory'));
    }
    
    public function store(Inventory $inventory)
    {
        $rules = array(
            'title'      => 'required','unique:inventories',
            'fabricationYear' => 'required','integer','max:2019',
       );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/Readme')
                ->withErrors($validator);
        } else {
            $article = new Article;
            $article->title       = Input::get('title');
            $article->user_id     = Auth::user()->id;
            $article->fabricationYear = Input::get('fabricationYear');
            $article->estado        = request('estado');
            $article->inventory_id  = $inventory->id;
            $article->save();

        
            Session::flash('message', 'Successfully created inventory!');
            
            return view('inventories.show',compact('inventory'));
        }
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
