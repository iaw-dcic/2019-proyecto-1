<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class WelcomeController extends Controller{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $posts = Post::where('public', true)->take(30)->orderBy('created_at')->get();
        return view('welcome')->with(['posts' => $posts]);
    }
}
