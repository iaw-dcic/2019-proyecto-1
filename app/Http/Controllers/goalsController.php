<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\goal;

class goalsController extends Controller
{
    public function getGoals()
    {
        $goals = goal::all();
        return view('Goals\goals',compact('goals'));
    }
}