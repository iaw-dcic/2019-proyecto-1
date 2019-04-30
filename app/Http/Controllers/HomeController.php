<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $lists = Lista::where('public_list', 1)->get();

        $data['lists'] = $lists;

        return view('home', $data);
    }
}
