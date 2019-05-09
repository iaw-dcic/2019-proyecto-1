<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Collection;
use App\Item;

class SearchController extends Controller
{
    public function search(Request $request){
        $users = User::where('name', 'LIKE', '%'.$request->username.'%')->get();
        return view('search')->withUsers($users);
    }

    public function showUser($id){
        $user = User::find($id);
        if (!is_null($user)){
            $user_collections = Collection::where('user_id', $id)->where('public_status', '1')->get()->sortByDesc('updated_at');
            $ids = $user_collections->pluck('id');
            $user_items = Item::whereIn('collection_id', $ids)->get();
            return view('users.user')->withUser($user)->withCollections($user_collections)->withItems($user_items);
        }
        else {
            $data = [
                "error_type" => "Show user",
                "description" => "The user you're trying to access doesn't exist.",
            ];
            return view('error')->withData($data);
        }
    }
}
