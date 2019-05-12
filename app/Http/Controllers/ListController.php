<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    
    protected function showList($id){

        $task = Task::where('id',$id)->get()->first();
        $user = User::where('id',$task->owner_id)->get()->first();

        if(Auth::check()){
            if(Auth::user()->id !=$user->id && $task->privacy != 'Public'){
                abort(404,'No tienes permisos para ver esta página');
            }
        }else{
            if($task->privacy != 'Public'){
                abort(404,'No tienes permisos para ver esta página');
            }
        }

        $items = Item::where('task_id',$id)->get();

        return view('/list', compact('items','user','task'));

    }

    protected function addItem($id){

        $validatedData = request()->validate([
            'cod' => 'required|max:255',
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'editorial' => 'required|max:255',
        ]);

        $item = new Item;

        $item->cod = request()->cod;
        $item->title = request()->title;
        $item->author = request()->author;
        $item->editorial = request()->editorial;
        $item->task_id = $id;
        $item->save();

        $task = Task::where('id',$id)->get()->first();
        $items = Item::where('task_id',$id)->get();
        $user = User::where('id',$task->owner_id)->get()->first();
        return view('/list', ['items' => $items , 'task' => $task, 'user' =>$user]);
    }

    protected function deleteItem($id){

        $user = Auth::user();
        $item = Item::where('id',$id)->get()->first();
        $task = Task::where('id',$item->task_id)->get()->first();

        if($user->id != $task->owner_id){
            abort(403,'No esta autorizado para realizar esta accion');
        }

        if($item!=null){
            $item->delete();
        }
        
        $items = Item::where('task_id',$task->id)->get();
        $user = User::where('id',$task->owner_id)->get()->first();

        return view('/list',compact('task', 'items','user'));
    }
}
