<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lista;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $users = User::where('username', 'LIKE', '%'.$search.'%')->orderBy('username')->take(10)->get(['username','avatar']);
        $listas = Lista::where('visibility',true)->where('listname', 'LIKE', '%'.$search.'%')->orderBy('listname')->take(10)->get(['id','listname','views','likes']);
        
        return view('search', ['users' => $users, 'listas' => $listas, 'search'=> $search]);
    }   

}
