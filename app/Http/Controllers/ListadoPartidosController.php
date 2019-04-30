<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;
use App\Player;
use App\Category;
use App\State;
use Auth;
use App\Rules\validarVisibilidad;

class ListadoPartidosController extends Controller
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
     *=  Partido::where('user_id',Auth::user()->id);
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $partidos = Partido::where('user_id', Auth::user()->id)->get();
        
        return view('listadoPartidos', ['partidos' => $partidos]);
    }

    public function borrarPartido($id)
    {

        $partido = Partido::where('id', $id)->get()->first();
        if (Auth::user()->id != $partido->user_id) {
            abort(403, 'No está autorizado para realizar la acción');
        }

        $jugadores = Player::where('id_partido', $partido->id)->get();
        foreach ($jugadores as $jugador) {
            $jugador->delete();
        }
        $partido->delete();

        return redirect('/listadoPartidos');
    }


    public function editarPartido($id)
    {
        $estados = State::get('visibilidad');
        $partido = Partido::findOrFail($id);
        $categorias = Category::get('category');
        $jugadores = player::where('id_partido', $id)->get();

        return view('/edit', ['categories' => $categorias, 'estados' => $estados, 'partido' => $partido, 'jugadores' => $jugadores]);
    }

    public function update(Request $request, $id)
    {

        $user = Auth::user();
        $partido = Partido::where('id', $id)->get()->first();
        if ($user->id != $partido->user_id) {
            abort(403, 'No está autorizado para realizar la acción');
        }
        $data = $request->all();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'place' => 'required|string|max:255',
            'category' => 'required|string|exists:categories|max:255',
            'public' => ['required', 'string', 'max:255', new validarVisibilidad()],
            'jugadores' => [],
        ]);

        /**Si existe algun campo distinto actualizarlo */
        //Si se cambio el nombre
        if (strcmp($data['name'], $partido->name) != 0)
            $partido->update(['name' => $data['name']]);
        //Si se cambio el lugar
        if (strcmp($data['place'], $partido->place) != 0)
            $partido->update(['place' => $data['place']]);

        //Si se actualizo la categoria
        if (strcmp($data['category'], $partido->category) != 0)
            $partido->update(['category' => $data['category']]);

        //Si se actualizo la privacidad
        if (strcmp($data['public'], $partido->public) != 0)
            $partido->update(['public' => $data['public']]);
        //Si se agrego Jugadores
        if(!empty($data['jugadores'])){
        foreach ($data['jugadores'] as $nuevoNombre) {
                $nuevo = new player;
                $nuevo->name = $nuevoNombre;
                $nuevo->id_partido = $partido->id;
                $nuevo->save();
            }
        }

//$partido->update(['name'=>$data['name']], ['place'=>$data['place']],['category'=>$data['category']],['public'=>$data['public']]);

return redirect('/listadoPartidos');
}

public function borrarJugador($id)
{
    $jugador = Player::where('id', $id)->get()->first();
    $idpartido = (Player::where('id', $id)->get()->first())->id_partido;
    if ($jugador != null)
        $jugador->delete();


    $estados = State::get('visibilidad');
    $partido = Partido::findOrFail($idpartido);
    $categorias = Category::get('category');
    $jugadores = player::where('id_partido', $idpartido)->get();

    return view('/edit', ['categories' => $categorias, 'estados' => $estados, 'partido' => $partido, 'jugadores' => $jugadores]);
}
}
