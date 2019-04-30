<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function readme()
    {
        return view('readme');
    }

    public function welcome(){
        $displayable_collections = Collection::where('user_id', Auth::user()->id)->get()->sortByDesc('updated_at');
        $ids = $displayable_collections->pluck('id');
        $displayable_items = Item::whereIn('collection_id', $ids)->get();
        return view('home.welcome_user')->withItems($displayable_items)->withCollections($displayable_collections);
    }
    
    public function search(Request $request){
        $users = User::where('name', 'LIKE', '%'.$request->username.'%')->get();
        return view('search')->withUsers($users);
    }
}