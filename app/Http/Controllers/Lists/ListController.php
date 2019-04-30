<?php

namespace App\Http\Controllers\Lists;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;
use App\Lista;
use App\Item;
use App\Like;

class ListController extends Controller
{
    public function getList($list_id)
    {

        $lista = Lista::where('id', $list_id)->get()->first();

        if ($lista == null) {
            abort(404);
        }

        $creator = User::where('id', $lista->user_id)->get(['username', 'avatar'])->first();
        $items = Item::where('list_id', $list_id)->get();
        $existsLike = false;

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->id != $lista->user_id) {
                if (!$lista->visibility) {
                    abort(403, 'Unauthorized action.');
                } else {
                    $lista->views = $lista->views + 1;
                    $lista->save();
                }
            }
            $like = Like::where('user_id', $user->id)->where('list_id', $list_id)->first();

            if ($like != null) {
                $existsLike = true;
            }
        } else {
            if (!$lista->visibility) {
                abort(403, 'Unauthorized action.');
            } else {
                $lista->views = $lista->views + 1;
                $lista->save();
            }
        }

        return view('lists/list', ['lista' => $lista, 'items' => $items, 'like' => $existsLike, 'creator' => $creator]);
    }

    public function likeList()
    {
        $input = Input::all();
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)->where('list_id', $input['list_id'])->first();
        if ($like != null) {
            abort(403, 'Unauthorized action.');
        }

        Like::create([
            'user_id' => $user->id,
            'list_id' => $input['list_id'],
        ]);

        DB::beginTransaction();
        $lista = Lista::where('id', $input['list_id'])->first();
        $lista->likes = $lista->likes + 1;
        $lista->save();
        DB::commit();

        return redirect('/lists/' . $input['list_id']);
    }

    public function unLikeList()
    {
        $input = Input::all();
        $user = Auth::user();

        $like = Like::where('user_id', $user->id)->where('list_id', $input['list_id'])->first();
        if ($like == null) {
            abort(403, 'Unauthorized action.');
        }

        try {
            DB::beginTransaction();
            $lista = Lista::where('id', $input['list_id'])->first();
            $lista->likes = $lista->likes - 1;
            $lista->save();
            DB::delete('delete from likes where list_id = ? and user_id = ?', [$input['list_id'], $user->id]);
            DB::commit();
            return redirect('/lists/' . $input['list_id']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/lists/' . $input['list_id']);
        }
    }
}
