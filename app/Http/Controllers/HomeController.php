<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
		return response()->json(['content'=> view('home.topVoted')->render()]);
	}
	public function mostViewed(){
		return response()->json(['content'=> view('home.mostViewed')->render()]);
	}
	public function newLists(){
		return response()->json(['content'=> view('home.newLists')->render()]);
	}
}
