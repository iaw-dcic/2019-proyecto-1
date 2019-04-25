<?php

namespace Listbook\Http\Controllers;

use Illuminate\Http\Request;
use Listbook\UserList;
use Listbook\ListElement;

class ListElementsController extends Controller
{
    public function store(UserList $userlist)
    {
        abort_if(auth()->id() !== $userlist->user_id, 403); //en caso de que el cliente modifique el POST manualmente
        $attributes = $this->validateRequest();
        $userlist->addElement($attributes);
        return back();
    }

    protected function validateRequest() {
        return request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
    }

    public function update(ListElement $listelement)
    {
        $this->authorize('modify', $listelement);
        $listelement->update($this->validateRequest());
        return redirect('/userlists');
    }

    public function destroy(ListElement $listelement)
    {
        $this->authorize('modify', $listelement);
        $listelement->delete();
        return back();
    }

    public function edit(ListElement $listelement)
    {
        return view('pages.userlist.editelement', compact('listelement'));
    }

}
