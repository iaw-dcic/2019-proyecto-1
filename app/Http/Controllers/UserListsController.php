<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\UserList;
use \App\User;

class UserListsController extends Controller {

    public function index($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
        return view('userlists.index', compact('user'));
    }

    public function create($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
        return view('userlists.create', compact('user'));
    }

    public function store($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		request()->validate([
			'list_name' => ['required', 'min:3'],
		]);
		$public = request('public') == "on" ? 1 : 0;
		$userList = UserList::create([
			'list_name' => request('list_name'),
			'user_id' => $user->id,
			'public' => $public
		]);
		return redirect('/'.$username.'/myLists');
    }

    public function show($username, $id){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		$list = UserList::findOrFail($id);
        return view('userlists.show', compact('user', 'list'));
    }

    public function update($username, $id){
        $list = UserList::findOrFail($id);
        $list->list_name = request('list_name');
        $list->save();
        return redirect('/'.$username.'/myLists');
    }

    public function destroy($username, $id){
        UserList::findOrFail($id)->delete();
        return redirect('/'.$username.'/myLists');
    }

    public function edit($username, $id){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		$list = UserList::findOrFail($id);
        return view ('userlists.edit', compact('user', 'list'));
    }
}
