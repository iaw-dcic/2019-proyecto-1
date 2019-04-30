<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListModel;

class GuestController extends Controller
{
    //
    public function welcome(){
        $lists = ListModel::where('status', 'Publica')
                                ->orderBy('updated_at', 'desc')
                                ->get();
        return view('welcome')->with('lists', $lists);
    }
}
