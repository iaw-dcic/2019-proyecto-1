<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListModel;
use App\User;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    //
    public function welcome(){
        // find public lists
        $publicLists = DB::table('lists')
            ->where('status', 'Publica');

        // join public lists with users to get the user name of each list
        $listUser = DB::table('users')
        ->select('public_lists.*', 'users.name as user_name')
        ->joinSub($publicLists, 'public_lists', function($join){
            $join->on('users.id', '=', 'public_lists.user_id')
                ->orderBy('public_lists.updated_at', 'desc');
            })->get();

        return view('welcome')->with('lists', $listUser);
    }

    public function showList(ListModel $list){
        $books = Book::where('list_id', $list['id'])
                        ->orderBy('name', 'asc')
                        ->get();
        return view('show-lista', ['list_name' => $list['name'], 'list_id' => $list['id']])->with('books', $books);
    }
}
