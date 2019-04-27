<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Lista;
use App\Item;
use DB;
use App\Rules\validarListNameEditList;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mylists()
    {
        $user = Auth::user();
        $listas = Lista::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();


        return view('lists/mylists', ['listas' => $listas]);
    }

    public function deleteList(Request $request)
    {
        $this->validate($request, [
            'list_id' => ['required', 'integer'],
        ]);

        $data = $request->all();
        $user = Auth::user();
        $lista = Lista::where('user_id', $user->id)->where('id', $data['list_id'])->first();

        if ($lista == null) {
            abort(403, 'Unauthorized action.');
        }

        try {
            DB::beginTransaction();
            DB::delete('delete from likes where list_id = ?', [$data['list_id']]);
            DB::delete('delete from items where list_id = ?', [$data['list_id']]);
            $lista->delete();
            DB::commit();
            return redirect('/mylists');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/mylists');
        }
    }

    public function editList($list_id)
    {
        $user = Auth::user();
        $lista = Lista::where('user_id', $user->id)->where('id', $list_id)->first();

        if ($lista == null) {
            abort(403, 'Unauthorized action.');
        }

        $items = Item::where('list_id', $list_id)->get();

        return view('lists/editlist', ['lista' => $lista, 'items' => $items]);
    }

    public function updateList(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'list_id' => ['required', 'integer'],
        ]);

        $lista = Lista::where('user_id', $user->id)->where('id', $request->list_id)->first();

        if ($lista == null) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'listname' => ['required', 'string', 'max:255', new validarListNameEditList($user->id, $request->list_id)],
            'descripcion' => 'nullable|string|max:755',
            'songs' => 'nullable|array',
            'songs.*' => 'nullable|array|size:3',
            'songs.*.*' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $modificacion = false;

        if (strcmp($lista->listname, $data['listname']) !== 0) {
            $lista->listname = $data['listname'];
            $modificacion == true;
        }

        $visibility = false;
        if (array_key_exists("visibility", $data)) {
            $visibility = true;
        }

        if ($lista->visibility != $visibility) {
            $lista->visibility = $visibility;
            $modificacion == true;
        }

        $description = "";
        if ($data['description'] != null) {
            $description = $data['description'];
        }

        if (strcmp($lista->description, $description) !== 0) {
            $lista->description = $description;
            $modificacion == true;
        }

        try {
            DB::beginTransaction();

            if ($request->songs != null) {
                $idLista = $data['list_id'];
                $canciones = $data['songs'];
                foreach ($canciones as $cancion) {
                    $item = Item::create([
                        'songname' => $cancion['song'],
                        'artist' => $cancion['artist'],
                        'album' => $cancion['album'],
                        'list_id' => $idLista,
                    ]);
                }
            }
            $lista->save();
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
