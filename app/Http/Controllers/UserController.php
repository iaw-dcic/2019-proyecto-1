<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    public function index($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		return view('profile', compact('user'));
	}
}
