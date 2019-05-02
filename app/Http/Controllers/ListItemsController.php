<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserList;
use App\ListItem;
use App\User;
use Auth;

class ListItemsController extends Controller{
	public function __construct()
    {
        $this->middleware('auth');
	}

	public function create($username, $listid){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		$list = UserList::findOrFail($listid);
		if($user != null) {
			if(Auth::user()->id == $user->id)
				return view('listItems.create', compact('user', 'list'));
			else abort('403', 'Unauthorized access');
		} else abort('404');
	}

	public function edit($username, $listid, $itemid){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		if($user != null){
			if($user->id == Auth::user()->id){
				$list = UserList::findOrFail($listid);
				$item = ListItem::findOrFail($itemid);
				return view('listItems.edit', compact('user', 'list', 'item'));
			}
			else{
				abort('403', 'Unauthorized access');
			}
		} else abort('404');
	}

	public function update($username, $listid, $itemid){
		$item = ListItem::findOrFail($itemid);
		$attributes = request()->validate(['name' => 'required',
			'priority' => 'required',
			'description' => '']);
		$item->update($attributes);
		return redirect('/'.$username.'/myLists');
	}

    public function store($username, $id){
		$userList = UserList::findOrFail($id);
		$attributes = request()->validate(['name' => 'required',
			'priority' => 'required',
			'description' => '']);
		$userList->addItem($attributes);
		return redirect('/'.$username.'/myLists');
	}

	public function destroy($username, $listid, $id){
		ListItem::findOrFail($id)->delete();
		return redirect('/'.$username.'/myLists');
	}
}
