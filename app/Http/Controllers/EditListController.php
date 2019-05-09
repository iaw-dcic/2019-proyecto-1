<?php

namespace App\Http\Controllers;

use App\Task;
use App\Rules\validarPrivacidad;
use App\User;
use App\Genre;
use Illuminate\Support\Facades\Auth;

class EditListController extends Controller
{

    protected function getEditList($id){

        $task = Task::where('id',$id)->get()->first();
        $user = User::where('id',$task->owner_id)->get()->first();

        if(Auth::user()->id != $user->id ){
            abort(403,'No tienes permiso para realizar esta accion');
        }

        $genres = Genre::all();

        return view('/editList',compact('task','user','genres'));

    }

    protected function editList($id){

        $task = Task::where('id',$id)->get()->first();
        $user = User::where('id',$task->owner_id)->get()->first();

        if(Auth::user()->id != $user->id ){
            abort(403,'No tienes permiso para realizar esta accion');
        }

        $validatedData = request()->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'genre' => 'required|exists:genres|max:255',
            'privacy' => ['required','string','max:255', new validarPrivacidad()],
        ]);

        if(strcmp(request('name'), $task->name)!=0){
            $task->update(['name' => request('name')]);
        }
        if(strcmp(request('desc'), $task->desc)!=0){
            $task->update(['desc' => request('desc')]);
        }
        if(strcmp(request('genre'), $task->genre)!=0){
            $task->update(['genre' => request('genre')]);
        }
        if(strcmp(request('privacy'), $task->privacy)!=0){
            $task->update(['privacy' => request('privacy')]);
        }

        $genres = Genre::all();

        $tasks = Task::where('owner_id',$user->id)->get();

        return view('/home',compact('tasks','user','genres'));
    }
}
