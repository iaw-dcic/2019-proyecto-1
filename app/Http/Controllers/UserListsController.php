<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\UserList;

class UserListsController extends Controller {

    public function index(){
        $lists = UserList::all();
        return view('userlists.index', ['lists' => $lists]);
    }

    public function create(){
        return view('userlists.create');
    }

    public function store(){
		request()->validate([
			'list_name' => ['required', 'min:3']
		]);
		UserList::create([
			'list_name' => request('list_name'),
			'author_id' => 1
		]);

        return redirect('/myLists');
    }

    public function show($id){
        $list = UserList::findOrFail($id);
        return view('userlists.show', compact('list'));
    }

    public function update($id){
        $list = UserList::findOrFail($id);
        $list->list_name = request('list_name');
        $list->save();
        return redirect('/myLists');
    }

    public function destroy($id){
        UserList::findOrFail($id)->delete();
        return redirect('/myLists');
    }

    public function edit($id){
        $list = UserList::findOrFail($id);
        return view ('userlists.edit', compact('list'));
    }
}
