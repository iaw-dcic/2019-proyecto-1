<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;

class SearchController extends Controller{
    public function search(){
		$lists = UserList::where('list_name', 'like', '%'.request('search').'%')->where('public', true)->get();
		return view('search', compact('lists'));
	}
}
