<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class CommentsController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id){
        $post = Post::find($post_id);
        $comments = $post->getComments()->orderBy('created_at')->get();
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id){
        if($request->ajax()){
            $now = new \Datetime();
            $user = User::where('username', $request->username)->get()->first();
            $comment = new Comment();
            $comment->user_id = $user->id;
            $comment->post_id = $post_id;
            $comment->content = $request->content;
            $comment->created_at = $now->format('Y-m-d H:m:s');
            $comment->save();
            return response()->json([
                'comment' => $comment,
                'username' => $user->username
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id, $id){
        //
    }
}
