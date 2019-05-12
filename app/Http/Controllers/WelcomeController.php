<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller{

    protected function get(){
        //muestro solo las públicas
        $tasks = Task::where('privacy','Public')->get(['id','name','desc','privacy','genre','owner_name','owner_id']);
        return view('welcome', ['tasks' => $tasks]);
    }

}
