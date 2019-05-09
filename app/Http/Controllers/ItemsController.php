<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Post;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       
           
            $item = new Item;
            $item->name = $request->input('name');
            $item->link = $request->input('link');
            $item->price = $request->input('price');
            $item->post_id =$request->input('post_id') ;
            $item->save();
            $post_id = $request->input('post_id') ;
            $post = Post::find($post_id);
            

            return view('items.create')->with('post_id', $post_id)->with('items', $post->items);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Item::find($id);
        return view('items.edit')->with('id', $id)->with('item', $item);
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
        $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
            'price' => 'required'
        ]);

        $item=Item::find($id);
        $item->name = $request->input('name');
        $item->link = $request->input('link');
        $item->price = $request->input('price');
        $item->save();

        return redirect('/home')->with('success', 'Post Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('posts.show')->with('success', 'Post Removed');
    }
}
