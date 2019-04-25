<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lista;

class PagesController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHome(){ return view('home'); }

    public function getWelcome() { return view('welcome');}

    public function getProfile(){return view('Profile\profile');}

    public function getGuest(){ return view('guest'); }

    public function getSignIn(){return view('signin');}

    public function getSettings(){return view('Profile\settings'); }
}
