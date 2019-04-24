<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;
use App\ListItem;

class ListItemsController extends Controller{
	public function __construct()
    {
        $this->middleware('auth');
	}

    public function store($userid, $id){
		$userList = UserList::findOrFail($id);
		$userList->addItem(request()->validate(['description' => 'required']));
		return back();
	}

	public function destroy($userid, $listid, $id){
		ListItem::findOrFail($id)->delete();
		return back();
	}
}
