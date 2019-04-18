<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')-> only('profile', 'update_profile');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = Auth::user();
        return view('editprofile', ['user' => $user]);
    }

    public function update_profile(Request $request) {
        $this->validate($request, [
          'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
     

        $filename = Auth::id().'_'.time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('/uploads/avatars'), $filename);
     
        $user = Auth::user();
        if(strcmp($user->avatar,"default_avatar.png") !== 0){
            unlink(public_path('/uploads/avatars/'.$user->avatar));
        }
        $user->avatar = $filename;
        $user->save();
     
        return redirect()->route('user.profile');
      }
}
