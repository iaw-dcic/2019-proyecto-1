<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

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
    
    public function addItem(Request $request){
        $data = $request->all(); //parametros del formulario
        //Tengo que validar los datos antes de cargarlos en la base de datos
        //dd($data); //esto me muestra los datos ingresados

        $validatedData = $request->validate([
            'cod' => 'required|unique:tasks|max:255',
            'name' => 'required',
            'quantity' => 'required|max:255',
            //defino regla para los dos campos posibles de privacidad.
            //'privacy' => [
              //  'required',
                //Rule::in(['Public', 'Private']),
            //],
        ]);

      //ACA TENGO QUE DEVOLVER LA VISTA CON LOS DATOS 

        $task = Task::create([
            'cod' => $data['cod'],
            'name' => $data['name'],
            'quantity' => $data['quantity'],
            'privacy' => $data['privacy'],
        ]);

        return view('home', ['tasks' => $task]);
    
    }
}
