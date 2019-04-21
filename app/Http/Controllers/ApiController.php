<?php

namespace Haiku\Http\Controllers;

use Illuminate\Http\Request;
use Haiku\User;

class ApiController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('welcome',['users'=>$users]);
    }
}
