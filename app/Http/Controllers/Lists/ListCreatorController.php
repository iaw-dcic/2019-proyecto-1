<?php

namespace App\Http\Controllers\Lists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genero;
use App\Lista;
use App\Item;
use DB;
use Validator;
use Illuminate\Validation\ValidationException;
use App\Rules\validarNombreListaCrearLista;

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
        $generos = Genero::get('genre');
        return view('lists/createlist', ['generos' => $generos]);
    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;

        $request->validate([
            'listname' => ['required','string','max:255', new validarNombreListaCrearLista($userId)],
            'genre' => ['required','exists:generos','string','max:255'],
            'descripcion' => ['nullable','string','max:755'],
            'songs' => ['required','array'],
            'songs.*' => ['required','array','size:3'],
            'songs.*.*' => ['required','string','max:255'],
        ]);

        $data = $request->all();

        $visibility = false;
        if (array_key_exists("visibility", $data)) {
            $visibility = true;
        }

        $description = "";
        if ($data['description'] != null) {
            $description = $data['description'];
        }

        try {
            DB::beginTransaction();

            $lista = Lista::create([
                'listname' => $data['listname'],
                'genre' => $data['genre'],
                'description' => $description,
                'visibility' => $visibility,
                'user_id' => $userId,
            ]);

            $idLista = $lista['id'];
            $canciones = $data['songs'];
            foreach ($canciones as $cancion) {
                $item = Item::create([
                    'songname' => $cancion['song'],
                    'artist' => $cancion['artist'],
                    'album' => $cancion['album'],
                    'list_id' => $idLista,
                ]);
            }
            DB::commit();
            return redirect('/mylists');
        } catch (\Exception $e) {
            DB::rollback();

            $validator = Validator::make([], []);
            $validator->errors()->add('repeatsong', "Usted ha ingresado filas duplicadas");

            throw new ValidationException($validator);
        }
    }
}

