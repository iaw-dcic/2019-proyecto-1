<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use App\Item;
use App\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')-> paginate(10);
        return view('posts.index')-> with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'name' => 'required',
            'link' => 'required',
            'price' => 'required'
        ]);


        $postExist = 0;
        $user= User::find(auth()->user()->id);
        $posts = $user->posts;
        $post_id = 0;
        foreach($posts as $post){
            if(($post->title) == $request->input('title')){
                $this->createItem($post_id, $request);
                $post_id= $post->id;
                $postExist = 1;
            }
        }
        if($postExist < 1){
            $post = new Post;
            $post->title = $request->input('title');
            $post->user_id = auth()->user()->id;
            $post->save();            
            $post_id = $post->id;
            $this->createItem($post_id, $request);
        }
        
        $userPost = Post::find($post_id);

        return redirect('/posts/create')->with('items',$userPost->items);
    }

    public function finishStore(Request $request){
        return redirect('/home');
    }

    private function createItem($post_id, Request $request){
        $post = Post::find($post_id);
        $item = new Item;
        $item->name = $request->input('name');
        $item->link = $request->input('link');
        $item->price = $request->input('price');
        $item->post_id = $post->id;
        $item->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
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
            'title' => 'required',
            'body' => 'required'
        ]);

        $post=Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Edited');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
