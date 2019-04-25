<?php

namespace Haiku\Http\Controllers;

use Illuminate\Http\Request;
use Haiku\User;
use Haiku\Album ;


class ApiController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        $users = User::all();
        return view('welcome',['users'=>$users,'albums'=>$albums]);
    }

    public function profile(){
        return 'hola mundo';

    }
}
