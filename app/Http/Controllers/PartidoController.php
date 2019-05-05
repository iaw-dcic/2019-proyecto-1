<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Auth;
use App\Rules\validarVisibilidad;
use App\Rules\validarPartidosUnicosUsuario;
use App\partido;
use App\player;
use App\state;

class PartidoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //Solo podemos acceder a estos métodos si estamos logeados
        $this->middleware('auth');
    }
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
        {
            $estados = state::get('visibilidad');
            $categorias = category::get('category');
            return view('partido',['categories' => $categorias],['estados'=>$estados]);
        }

    
    public function crearPartido(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
       
        $request->validate([
            'name' => ['required','string','max:255', new validarPartidosUnicosUsuario($user->id)],
            'place'=>'required|string|max:255',
            'category'=>'required|string|exists:categories|max:255',
            'public'=> ['required','string','max:255', new validarVisibilidad()],
            'jugadores'=>['max:255'],
            ]);
    
            //Crear Partido
            $partido = new partido;
            $partido->name = $data['name'];
            $partido->place= $data['place'];
            $partido->category=$data['category'];
            $partido->public= $data['public'];
            $partido->user_id=$user->id;
            $partido->save();
     
            //Agregar Participantes al partido
            foreach ($data['jugadores'] as $jugador) {
                $jugadorNuevo = new player;
                $jugadorNuevo->name = $jugador;
                $jugadorNuevo->id_partido = $partido->id;
                $jugadorNuevo->save();
            }
        return redirect('/listadoPartidos');
    }
   
    
   
      
}
