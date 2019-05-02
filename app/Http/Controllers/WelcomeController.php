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
        $posteos = Post::where('public', true)->orderBy('created_at', 'desc')->get();
        return view('welcome')->with(['posteos' => $posteos]);
    }
}
