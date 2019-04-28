<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller{

    protected function get(){

        if(Auth::check()){
            //muestro los públicos de los demás PERO ESTOY MOSTRANDO MAL ACA
            $tasks = Task::where('owner_id', '!=', auth()->id())->get();
            return view('welcome',['tasks'=>$tasks]);

        }else{
            //muestro todos
            //$tasks = Task::orderBy('created_at', 'asc')->get(['id','cod','name','quantity','privacy','owner_id']);
            $tasks = Task::where('privacy','Public')->get(['id','cod','name','quantity','privacy','owner_id']);
            return view('welcome', ['tasks' => $tasks]);
        }
    }
}
