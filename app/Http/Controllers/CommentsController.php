<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller{

    public function __construct(){
    }

    public function index($post_id){
        $post = Post::find($post_id);
        $comments = $post->getComments()->orderBy('created_at')->get();
        return $comments;
    }

    public function store(Request $request, $post_id){
        $this->middleware('auth');
        if($request->ajax()){
            $now = new \Datetime();
            $user = User::where('username', Auth::user()->username)->get()->first();
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
}
