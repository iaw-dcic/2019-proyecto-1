<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use displayable_stuff;


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

    public function about()
    {
        return view('about');
    }

    public function welcome()
    {
        $public_collections = Collection::where('public_status', '1');
        if(Auth::check()){
            $displayable_collections = Collection::where('user_id', Auth::user()->id)->union($public_collections)->get()->sortByDesc('updated_at');
            $ids = $displayable_collections->pluck('id');
            $displayable_items = Item::whereIn('collection_id', $ids)->get();
            return view('welcome')->withItems($displayable_items)->withCollections($displayable_collections);
        }
        return view('welcome')->withCollections($public_collections->get());
    }
    
    public function search(Request $request){
        $users = User::where('name', 'LIKE', '%'.$request->username.'%')->get();
        return view('search')->withUsers($users);
    }
}