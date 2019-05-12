<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Item;
use App\Rules\validarPrivacidad;
use App\User;
use App\Genre;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $genres = Genre::all();
        
        return view('home', compact('genre'));
    }
    
    protected function addList(Request $request){
        
        $data = $request->all(); //parametros del formulario
        //Tengo que validar los datos antes de cargarlos en la base de datos
        //dd($data); //esto me muestra los datos ingresados

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'genre' => 'required|string|exists:genres|max:255',
            'privacy' => ['required','string','max:255', new validarPrivacidad()],
        ]);

      //ACA TENGO QUE DEVOLVER LA VISTA CON LOS DATOS 
        $user = User::where('id',auth()->id())->get()[0];
        $task = new Task;
        //$task->id = $request->id;
        $task->name = $request->name;
        $task->desc = $request->desc;
        $task->genre = $request->genre;
        $task->privacy = $request->privacy;
        $task->owner_id = $user->id;
        $task->owner_name = $user->name;
        $task->save();
        
        $tasks = Task::where('owner_id', auth()->id())->get(['id','name','desc','privacy','genre','owner_id']);
        $genres = Genre::all();
        return view('home', ['tasks' => $tasks , 'genres'=>$genres]);
    
    }
    
    protected function getTable(){

        $tasks = Task::where('owner_id', auth()->id())->get(['id','name','desc','privacy','genre','owner_id']);
        $genres = Genre::all();
        return view('home', ['tasks' => $tasks , 'genres'=>$genres]);
    }

    protected function destroy($id){

        $task = Task::where('id',$id)->get()->first();
        if(Auth::user()->id != $task->owner_id){
            abort(403,"No está autorizado para realizar esta accion");
        }

        $items = Item::where('task_id',$id)->get();

        foreach($items as $item){
            $item->delete();
        }

        $task->delete();

       // Task::findOrFail($id)->delete();
        $tasks = Task::where('owner_id', auth()->id())->get(['id','name','desc','privacy','genre','owner_id']);
        $genres = Genre::all();
        return view('home', ['tasks' => $tasks , 'genres'=>$genres ]);
    }

    protected function changeVisibility($id){

        $task = Task::where('id',$id)->get(['id','name','desc','privacy','genre','owner_id']);

        if($task){

            switch($task->all()[0]->privacy){
              case 'Public':
                  Task::where('id',$id)->update(['privacy'=> 'Private']);      
                  break;
              case 'Private':
                  Task::where('id',$id)->update(['privacy'=> 'Public']);          
                  break;
          }
        }
        
        return redirect('/home');
       

    }
}
