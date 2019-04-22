<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{
    public function home(){
        return redirect('/topVoted');
	}

	public function topVoted(){
		return view('home.topVoted');
	}

	public function mostViewed(){
		return view('home.mostViewed');
	}

	public function newLists(){
		return view('home.newLists');
	}
}
