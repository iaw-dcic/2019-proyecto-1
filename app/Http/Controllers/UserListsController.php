<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\UserList;
use \App\User;
use Auth;

class UserListsController extends Controller {

    public function index($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		if($user!=null)
			return view('userlists.index', compact('user'));
		else {
			abort('404');
		}
	}

    public function create($username){
		$useraux = User::where('username', $username)->get();
		$user = $useraux->first();
		if($user!=null){
			if(Auth::user()->id == $user->id)
				return view('userlists.create', compact('user'));
			else {
				abort('403', 'Unauthorized access');
			}
		} else abort('404');
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

	public function show(){
		abort('404', 'Not Found');
	}

    public function update($username, $id){
		$list = UserList::findOrFail($id);
		request()->validate([
			'list_name' => ['required', 'min:3'],
		]);
		$list->list_name = request('list_name');
		request('public') == "on" ? 1 : 0;
		$list->public = request('public') == "on" ? 1 : 0;
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
		if($user!= null){
			if($user->id ==
				$list->user->id){
				return view ('userlists.edit', compact('user', 'list'));
			}
			else{
				abort('403', 'Unauthorized access');
			}
		}else
			abort('404', 'The user in the url is invalid');
	}


}
