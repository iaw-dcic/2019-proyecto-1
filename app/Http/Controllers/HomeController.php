<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Genre;
use App\SentimentalSituation;

class HomeController extends Controller
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
        $countries = Country::all();
        $genres = Genre::all();
        $situations = SentimentalSituation::all();
        return view('home', compact('countries', 'genres', 'situations'));
    }
}
