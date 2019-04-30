<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UserList;
use \App\Like;
use Auth;

class LikesController extends Controller
{
    public function like($listid){
		$list = UserList::findOrFail($listid);
		if(Auth::check()){
			$logged = Auth::user()->id;
			if(Like::where('user_id', $logged)->where('user_list_id', $listid)->get()->first() == null){
				$list->addLike([
					'user_id' => $logged
				]);
			}
		}
		return response()->json(['content'=> count($list->likes)]);
	}
}
