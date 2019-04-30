<?php

namespace App\Http\Controllers;

use App\Game;
use Auth;

class PagesController extends Controller
{

    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    public function home()
    {
        return view('pages.home');
    }

    public function about() 
    {
        return view('pages.about');
    }

    public function games()
    {
        return view('pages.games');
    }

    public function searchlisting() 
    {
        return view('listings.listing-search');
    }


    

}
