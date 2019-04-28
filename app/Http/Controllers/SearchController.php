<?php

namespace Cinefilo\Http\Controllers;

use Illuminate\Http\Request;
use \Cinefilo\User;

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
    	return view('search.userprofile', compact('user'));
    }
}
