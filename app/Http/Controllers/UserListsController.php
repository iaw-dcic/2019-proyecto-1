<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\UserList;
use \App\User;

class UserListsController extends Controller {

    public function index($id){
		$lists = UserList::where('user_id', auth()->id())->get();
		$user = User::findOrFail($id);
        return view('userlists.index', compact('user','lists'));
    }

    public function create($id){
        $user = User::findOrFail($id);
        return view('userlists.create', compact('user'));
    }

    public function store($id){
        $user = User::findOrFail($id);
		request()->validate([
			'list_name' => ['required', 'min:3'],
		]);
		UserList::create([
			'list_name' => request('list_name'),
			'user_id' => $user->id
		]);

        return redirect('/'.$id.'/myLists');
    }

    public function show($userid, $id){
		$user = User::findOrFail($userid);
		$list = UserList::findOrFail($id);
        return view('userlists.show', compact('user', 'list'));
    }

    public function update($userid, $id){
        $list = UserList::findOrFail($id);
        $list->list_name = request('list_name');
        $list->save();
        return redirect('/'.$userid.'/myLists');
    }

    public function destroy($userid, $id){
        UserList::findOrFail($id)->delete();
        return redirect('/'.$userid.'/myLists');
    }

    public function edit($userid, $id){
		$user = User::findOrFail($userid);
        $list = UserList::findOrFail($id);
        return view ('userlists.edit', compact('user', 'list'));
    }
}
