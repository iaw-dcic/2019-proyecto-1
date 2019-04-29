<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Lista;
use App\Song;

class SearchController extends Controller
{

	public function onSearch(){

		$usuarios = User::where([
			['name', 'like', request('user').'%'],
			['id', '<>', auth()->id()] // you cannot find yourself when you're looking for people
		])->get();

		return view('usuarios.search', compact('usuarios'));
	}

	public function seeUserProfile(User $user){
		abort_if($user->id == auth()->id(), 403, 'Sorry, you are not authorized');

		$listas = Lista::where([
			['user_id', $user->id],
			['public', 1]
		])->get();

		return view('usuarios.userProfile', compact('user', 'listas'));
	}

	public function seeUserList(User $user, Lista $list){
		abort_if($list->public == 0, 403, 'Sorry, you are not authorized');
		abort_if($user->id == auth()->id(), 403, 'Sorry, you are not authorized');

		$songs = Song::where('lista_id', $list->id)->get();

		return view('usuarios.userList', compact('user', 'list', 'songs'));
	}

	public function seeUserSong(User $user, Lista $list, Song $song){
		abort_if($list->public == 0, 403, 'Sorry, you are not authorized');
		abort_if($user->id == auth()->id(), 403, 'Sorry, you are not authorized');

		return view('usuarios.userSong', compact('song'));
	}
}
