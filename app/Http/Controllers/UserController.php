<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('profile', 'update_profile');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = Auth::user();
        $return = [
            'username' => $user['username'],
            'avatar' => $user['avatar'],
            'description' => $user['description'],
        ];
        //dd($return['avatar']);
        return view('profile/editprofile', ['user' => $return]);
    }

    public function update_profile(Request $request)
    {

        $this->validate($request, [
            'username' => ['nullable', 'string', 'max:50', 'alpha_num' ,'unique:users'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'descripcion' => ['nullable', 'string', 'max:755'],
        ]);

        $data = $request->all();
        $user = Auth::user();

        $modification = false;

        if ($data['username'] != null) {
            $user->username = $data['username'];
            $modification = true;
        }
        if ($request->has('avatar')) {
            $filename = Auth::id() . '_' . time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('/uploads/avatars'), $filename);
            if (strcmp($user->avatar, "default_avatar.png") !== 0 && substr_compare($user->avatar, 'https://', 0, 8)!==0) {
                unlink(public_path('/uploads/avatars/' . $user->avatar));
            }
            $user->avatar = $filename;
            $modification = true;
        }

        if ($data['description'] != null) {
            $user->description = $data['description'];
            $modification = true;
        }

        if($modification){
            $user->save();
        }

        return redirect()->route('user.profile');
    }
}
