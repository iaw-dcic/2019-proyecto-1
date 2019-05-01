<?php

namespace App\Http\Controllers;

use Auth;
use App\MovieList;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(4);

        return view('allusers')->with('users',$users);
    }

    public function show($id)
    {
        $user=User::find($id);

        $lists= MovieList::where(['user_id' => $id])->get();

        return view('showuser',['user' => $user],['lists' => $lists]);
    }

    public function login()
    {
        return redirect()->route('user.login');
    }

    public function create()
    {
        return view('registerView');
    }

    public function store()
    {
        $data=request()->all();

        User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=>bcrypt($data['password'])
        ]);

        return redirect()->route('users.index');
    }
    
    public function edit(User $user)
    {
        return view('profile',['user' => $user]);
    }

    public function update(User $user)
    {
        $user->name=request('name');
        $user->email=request('email');
        $user->password=bcrypt(request('password'));
        $user->save();

        return back();
    }

    public function mylists()
    {
        $user = Auth::user();

        $id=$user->id;

        $lists= MovieList::where(['user_id' => $id])->get();

        return view ('userlists',compact('lists'));

    }


}
