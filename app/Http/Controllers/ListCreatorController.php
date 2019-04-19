<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genero;
use App\Lista;
use App\Item;
use Auth;

class ListCreatorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $generos = Genero::get('name');
        return view('createlist',['generos' => $generos]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $visibility = false;
        if(array_key_exists("visibility",$data)){
            $visibility = true;
        }

        $lista = Lista::create([
            'name' => $data['listname'],
            'genre' => $data['genre'],
            'description' => $data['description'],
            'visibility' => $visibility,
            'user_id' => auth()->user()->id,
        ]);

        $idLista = $lista['id'];
        $canciones = $data['songnames'];
        $artistas = $data['artists'];
        $albunes = $data['albums'];

        $cantCanciones = count($canciones);
        for($i = 0, $size = $cantCanciones; $i < $size; $i++) {
            $item = Item::create([
                'songname' => $canciones[$i],
                'artist' => $artistas[$i],
                'album' => $albunes[$i],
                'list_id' => $idLista,
            ]);
        }

        return redirect('/lists/');
    }
}
