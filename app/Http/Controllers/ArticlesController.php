<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index',compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
    {
        Article::create(
            request()->validate([
                'title'=> ['required','string'],
                'fabricationYear' => ['required','integer','min:1930','max:2019'],
                'price' => ['required','integer','min:0']
            ]));
        return redirect('/articles');
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
            'fabricationYear' => ['required','integer','min:1930','max:2019'],
            'price' => ['required','integer','min:0']
        ]);
        $article->update($atributes);
        $article->save();

        return redirect('/articles');
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

        return redirect('/articles');
    }
}
