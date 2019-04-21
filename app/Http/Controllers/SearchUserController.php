<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class SearchUserController extends Controller
{

    public function searchUser (Request $request) {
        $search= $request->get('searchTerm');
  
        $userSearch = User::where('name', 'LIKE', '%' .$search. '%')->get();

        return view('pages.search')->with('userSearch',$userSearch);
    }

    
}
