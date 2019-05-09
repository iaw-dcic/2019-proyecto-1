<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        $page = $request->query('page') ?: 1;
        $posteos = Post::where('public', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('home')->with(['posteos' => $posteos, 'page' => $page]);
    }
}
