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
    public function index(Request $request){
        $page = $request->query('page') ?: 1;
        $posteos = Post::where('public', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('welcome')->with(['posteos' => $posteos, 'page' => $page]);
    }
}
