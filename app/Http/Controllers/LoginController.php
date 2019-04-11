<?php

namespace App\Http\Controllers;

class LoginController extends Controller
{
    public function getLoginView(){
    	return view('login');
    }

}
