<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class PagesController extends Controller {
    public function home() {
        return view('welcome');
    }

    public function profile() {
        return view('profile');
    }

    public function about() {
        return view('about');
    }

    public function browse() {
        $album = Album::select('*')->where('public',1)->get();
        return view('browse',compact('album'));
    }
}