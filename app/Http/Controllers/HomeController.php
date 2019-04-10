<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function getHomeView(){
    	return view('home');
    }

}
