<?php

namespace Cinefilo\Http\Controllers;

use Illuminate\Http\Request;
use \Cinefilo\MovieList;
use \Cinefilo\Movie;

class MovieController extends Controller
{
    public function create(MovieList $list) {
    	return view('movies.createmovie', compact('list'));
    }

    public function store($id) {
    	$movie = new Movie();
    	
    	$movie->list_id = $id;
    	$movie->name = request('name');
    	$movie->year = request('year');
    	$movie->genre = request('genre');
    	$movie->description = request('description');

    	$movie->save();

    	return redirect('lists/'.$id);
    }

    public function edit(MovieList $list, Movie $movie) {
        if (auth()->user()==null)
            return view('auth.login');
        else if (auth()->user()->id != $list->user_id ||
                $list->id != $movie->list_id)
            return view('error');

    	return view('movies.editmovie')
                    ->with(compact('list'))
                    ->with(compact('movie'));
    }

    public function update($idList, Movie $movie) {
    	$movie->name = request('name');
    	$movie->year = request('year');
    	$movie->genre = request('genre');
    	$movie->description = request('description');

    	$movie->save();

    	return redirect('lists/'.$idList);
    }

    public function delete($idList, Movie $movie) {
        $movie->delete();

        return redirect('lists/'.$idList);
    }
}
