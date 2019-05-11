<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
Use App\Post;


class PagesController extends Controller
{
    public function index(){

        $postsIndex = Post::orderBy('updated_at','asc')->take(4)->get();
        $users = User::all();
        $posts = Post::all();

        return view('index')->with('postsIndex',$postsIndex)->with('users',$users)->with('posts',$posts);
    }

    public function user($id){

        $user = User::find($id);
        
        if(auth()->user()==NULL){
            return view('user')->with('posts', $user->posts)->with('user',$user);
        }
        
        if($id == auth()->user()->id)
            return view('home')->with('posts', $user->posts);
        else
            return view('user')->with('posts', $user->posts)->with('user',$user);
    }

    public function edit($id){
        $user = User::find($id);
        return view('edituser')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email'); 
        $user->edad = $request->input('edad');
        $user->profesion = $request->input('profesion');  

        $user->save();

        return redirect('/home')->with('success','Datos Actualizados');
    }

}
