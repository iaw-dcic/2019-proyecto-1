<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller{

    protected function get(){
        //muestro solo las públicas
        $tasks = Task::where('privacy','Public')->get(['id','cod','title','author','editorial','privacy','owner_id','owner_name']);
        return view('welcome', ['tasks' => $tasks]);
    }

}
