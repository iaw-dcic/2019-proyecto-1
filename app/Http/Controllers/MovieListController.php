<?php

namespace Cinefilo\Http\Controllers;

use Illuminate\Http\Request;

class MovieListController extends Controller
{
    public function index() {
    	$user = auth()->user();
    	$lists = \Cinefilo\MovieList::where('user_id', $user->id)
    									->get();

    	return view('lists.showlists', compact('lists'));
    }

    public function store() {
    	$user = auth()->user();
    	$list = new \Cinefilo\MovieList();

    	$list->user_id = $user->id;
    	$list->name = request('name');
    	if (request('public')!=null)
    		$list->public = 1;
    	else
    		$list->public = 0;

    	$list->save();

    	return redirect('lists');
    }

    public function create() {
    	return view('lists.createlist');
    }
}
