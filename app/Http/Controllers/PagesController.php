<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function about(){
    	return view('pages.about');
    }

    public function games(){
    	return view('pages.games');
    }
    
    public function home(){
    	return view('pages.home');
    }

  
}