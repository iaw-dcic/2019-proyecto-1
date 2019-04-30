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
    public function __construct(){
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


	public function readme(){
		return view('readme');
	}

    public function index()
    {
        return view('home');
	}

	public function redHome(){
		return redirect('home');
	}

	public function topVoted(){
		$lists = UserList::withCount('likes')->orderBy('likes_count', 'desc')
			->where('public', true)->take(15)->get();
		return response()->json(['content'=> view('home.homeposts', compact('lists'))->render()]);
	}
	public function newLists(){
		$lists = UserList::orderBy('created_at', 'desc')->where('public', true)->take(15)->get();
		return response()->json(['content'=> view('home.homeposts', compact('lists'))->render()]);
	}

}
