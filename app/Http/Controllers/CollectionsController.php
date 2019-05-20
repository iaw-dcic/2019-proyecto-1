<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use JD\Cloudder\Facades\Cloudder;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::where('is_public',true)->get();
        return view('collections.index')->with('collections',$collections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = new Collection;

        $collection->collection_name = $request->input('collection_name');

        if($request->input('public')==0){
            $collection->is_public = false;
        }elseif ($request->input('public')==1) {
            $collection->is_public = true;
        }

        $user = auth()->user();

        $collection->user_id = $user->id;

        $collection->save();

        return redirect('home')->with('success','Lista creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = Collection::find($id);
        
        return view('collections.show')->with('collection',$collection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Collection::find($id);
        $posts = $collection->posts;
        return view('collections.edit')->with('collection',$collection)->with('posts', $posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $collection = Collection::find($id);

        $collection->collection_name = $request->input('collection_name');
        
        if($request->input('public')==0){
            $collection->is_public = false;
        }elseif ($request->input('public')==1) {
            $collection->is_public = true;
        }

        $collection->save();

        return redirect('home')->with('success','Lista Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * Si yo elimino una lista, primero tengo que eliminar todos los posts
         * asociados a esa lista.
         */

        $collection = Collection::find($id);
        $posts = $collection->posts;

        foreach ($posts as $key => $post) {
            Cloudder::delete($post->cover_image, []);
            $post->delete();
        }

        $collection->delete();


        return redirect('home')->with('success','Lista Borrada');
    }
}
