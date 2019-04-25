<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lista;

class listsController extends Controller
{
    public function getMyLists(){
    
        $listas = lista::all();
        return view('Profile\myLists',compact('listas'));
    }
}
