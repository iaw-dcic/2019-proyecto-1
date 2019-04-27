<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;
use App\ListItem;
use App\User;

class ListItemsController extends Controller{
	public function __construct()
    {
        $this->middleware('auth');
	}

	public function edit($username, $listid, $itemid){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		$list = UserList::findOrFail($listid);
		$item = ListItem::findOrFail($itemid);
		return view('listitems.edit', compact('user', 'list', 'item'));
	}

	public function update($username, $listid, $itemid){
		$item = ListItem::findOrFail($itemid);
		$attributes = request()->validate(['name' => 'required',
			'priority' => 'required',
			'description' => '']);
		$item->update($attributes);
		return redirect('/'.$username.'/myLists/'.$listid);
	}

    public function store($userid, $id){
		$userList = UserList::findOrFail($id);
		$attributes = request()->validate(['name' => 'required',
			'priority' => 'required',
			'description' => '']);

		$userList->addItem($attributes);
		return back();
	}

	public function destroy($userid, $listid, $id){
		ListItem::findOrFail($id)->delete();
		return back();
	}
}
