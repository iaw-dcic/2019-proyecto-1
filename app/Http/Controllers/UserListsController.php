<?php

namespace App\Http\Controllers;

use App\UserList;
use App\User;
use Illuminate\Http\Request;

class UserListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLists = UserList::where('public', 1)->get();
        return view('pages.userlist.index', compact('userLists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {
        abort_if(auth()->id() !== $user->id, 403); //en caso de que el cliente modifique el POST manualmente
        $listAttr = $this->validateRequest();
        $user->addList($listAttr + ["user_id" => $user->id]);
        return back();
    }

    protected function validateRequest() {
        return request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserList  $userList
     * @return \Illuminate\Http\Response
     */
    public function show(UserList $userlist)
    {
        abort_if($this->unauthorizedListAccess($userlist), 403);
        return view('pages.userlist.show', compact('userlist'));
    }

    protected function unauthorizedListAccess($userlist) {
        return $userlist->user_id !== auth()->id() && !($userlist->public);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserList  $userList
     * @return \Illuminate\Http\Response
     */
    public function edit(UserList $userlist)
    {
        return view('pages.userlist.edit', compact('userlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserList  $userList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserList $userlist)
    {
        $this->authorize('modify', $userlist);
        $userlist->update($this->validateRequest());
        return view('pages.userlist.show', compact('userlist'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserList  $userList
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserList $userlist)
    {   
        $this->authorize('modify', $userlist);
        $userlist->delete();
        return redirect('/userlists');
    }

}
