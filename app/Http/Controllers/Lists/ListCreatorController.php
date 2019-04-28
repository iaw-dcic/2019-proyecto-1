<?php

namespace App\Http\Controllers\Lists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Genero;
use App\Lista;
use App\Item;
use DB;
use Validator;
use Illuminate\Validation\ValidationException;

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

        /*$request->validate([
            'listname' => 'required|'.
                            Rule::unique('listas')->where(function ($query) use ($userId) {
                                return $query->where('user_id','=',$userId);}).
                            '|string|max:255',
            'genre' => 'required|exists:generos|string|max:255',
            'descripcion' => 'nullable|string|max:755',
            'songnames' => 'required',
            'songnames.*' => 'required|string|max:255',
            'artists' => 'required',
            'artists.*' => 'required|string|max:255',
            'albums' => 'required',
            'albums.*' => 'required|string|max:255',
        ]);*/

        $request->validate([
            'listname' => 'required|' .
                Rule::unique('listas')->where(function ($query) use ($userId) {
                    return $query->where('user_id', '=', $userId);
                }) .
                '|string|max:255',
            'genre' => 'required|exists:generos|string|max:255',
            'descripcion' => 'nullable|string|max:755',
            'songs' => 'required|array',
            'songs.*' => 'required|array|size:3',
            'songs.*.*' => 'required|string|max:255',
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

            $repetidos = array_keys($canciones, $cancion);
            $validator = Validator::make([], []);
            foreach ($repetidos as $divrepetido) {
                $validator->errors()->add($divrepetido, "Error Item Duplicado");
            }
            throw new ValidationException($validator);
        }
    }
}

