<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

use App\User;

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
        
        return view('home');
    }
    
    protected function addItem(Request $request){
        
        $data = $request->all(); //parametros del formulario
        //Tengo que validar los datos antes de cargarlos en la base de datos
        //dd($data); //esto me muestra los datos ingresados

        $validatedData = $request->validate([
            'cod' => 'required|unique:tasks|max:255',
            'title' => 'required',
            'author' => 'required|max:255',
            //defino regla para los dos campos posibles de privacidad.
            //'privacy' => [
              //  'required',
                //Rule::in(['Public', 'Private']),
            //],
        ]);

      //ACA TENGO QUE DEVOLVER LA VISTA CON LOS DATOS 
        $user = User::where('id',auth()->id())->get()[0];
        $task = new Task;
        //$task->id = $request->id;
        $task->cod = $request->cod;
        $task->title = $request->title;
        $task->author = $request->author;
        $task->editorial = $request->editorial;
        $task->privacy = $request->privacy;
        $task->owner_id = $user->id;
        $task->owner_name = $user->name;
        $task->save();

        //$tasks = Task::orderBy('created_at', 'asc')->get(['id','cod','name','quantity','privacy','owner_id']);
        $tasks = Task::where('owner_id', auth()->id())->get(['id','cod','title','author','editorial','privacy','owner_id']);
        return view('home', ['tasks' => $tasks]);
    
    }
    
    protected function getTable(){

        $tasks = Task::where('owner_id', auth()->id())->get(['id','cod','title','author','editorial','privacy','owner_id']);
        return view('home', ['tasks' => $tasks]);
    }

    protected function destroy($id){

        Task::findOrFail($id)->delete();
        
        $tasks = Task::where('owner_id', auth()->id())->get(['id','cod','title','author','editorial','privacy','owner_id']);

        return view('home', ['tasks' => $tasks]);
    }

    protected function changeVisibility($id){

        $task = Task::where('id',$id)->get(['id','cod','title','author','editorial','privacy','owner_id']);


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

        

        $tasks = Task::where('owner_id', auth()->id())->get(['id','cod','title','author','editorial','privacy','owner_id']);
        
        return view('home', compact('tasks'));

        
    }
}
