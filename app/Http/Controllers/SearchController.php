<?php

namespace Cinefilo\Http\Controllers;

use Illuminate\Http\Request;
use \Cinefilo\User;
use \Cinefilo\MovieList;
use \Cinefilo\Movie;

class SearchController extends Controller
{
    public function index() {
    	return view('search.searchuser');
    }

    public function show() {
    	$users = User::where('name', 'like', request('name').'%')
    					->get();

    	return view('search.searchresults', compact('users'));
    }

    public function showUser(User $user) {
        $lists = MovieList::where('user_id', $user->id)
                            ->where('public', 1)
                            ->get();

    	return view('search.userprofile')
                    ->with(compact('user'))
                    ->with(compact('lists'));
    }

    public function showList(User $user, MovieList $list) {
        if ($user->id != $list->user_id ||
            $list->public == 0)
            return view('error');

        $movies = Movie::where('list_id', $list->id)->get();

        return view('search.userlist')
                ->with(compact('user'))
                ->with(compact('list'))
                ->with(compact('movies'));
    }

    public function showMovie(User $user, MovieList $list, Movie $movie) {
        if ($user->id != $list->user_id ||
            $list->public == 0 ||
            $list->id != $movie->list_id)
            return view('error');

        return view('search.userlistmovies')
                    ->with(compact('user'))
                    ->with(compact('list'))
                    ->with(compact('movie'));
    }
}
