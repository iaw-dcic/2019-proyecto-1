<?php

namespace Cinefilo\Http\Controllers;

use Illuminate\Http\Request;
use \Cinefilo\MovieList;
use \Cinefilo\Movie;

class MovieListController extends Controller
{
    public function index() {
    	$user = auth()->user();

        if ($user==null)
            return view('auth.login');

    	$lists = MovieList::where('user_id', $user->id)
    						->get();

    	return view('lists.showlists', compact('lists'));
    }

    public function store() {
    	$user = auth()->user();
    	$list = new MovieList();

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

    public function edit(MovieList $list) {
        return view('lists.editlist', compact('list'));
    }

    public function update(MovieList $list) {
        $list->name = request('name');
        if (request('public')!=null)
            $list->public = 1;
        else
            $list->public = 0;

        $list->save();

        return redirect('lists');
    }

    public function show(MovieList $list) {
        if (auth()->user()==null)
            return view('auth.login');
        else if (auth()->user()->id != $list->user_id)
            return view('error');

        $movies = Movie::where('list_id', $list->id)
                        ->get();

        return view('lists.list')
                ->with(compact('movies'))
                ->with(compact('list'));
    }

    public function delete(MovieList $list) {
        $list->delete();

        return redirect('lists');
    }
}
