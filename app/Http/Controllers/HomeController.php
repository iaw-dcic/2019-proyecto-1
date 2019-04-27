<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
	}

	public function redHome(){
		return redirect('home');
	}

	public function topVoted(){
		return response()->json(['content'=> view('home.homeposts', ['lists' => []])->render()]);
	}
	public function mostViewed(){
		return response()->json(['content'=> view('home.homeposts', ['lists' => []])->render()]);
	}
	public function newLists(){
		$lists = UserList::orderBy('created_at', 'desc')->where('public', true)->take(10)->get();
		return response()->json(['content'=> view('home.homeposts', compact('lists'))->render()]);
	}
}
