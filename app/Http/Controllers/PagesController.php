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

    public function addGame() {
        return view ('games.create');
    }

    public function home(){
    	return view('pages.home');
    }
    public function login(){
    	return view('pages.login');
    }

    public function register(){
    	return view('pages.register');
    }
  
}
