<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(4);

        return view('userslist')->with('users',$users);
    }

    public function show(User $user)
    {
        //
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


}
