<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['only' => ['index','create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userData = Auth::user();

        if($userData) {
            $data['userData'] = $userData;
        } else {
            $data['userData'] = [];
        }

        return view('profile.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $userData = Auth::user();

        if($userData) {
            $data['userData'] = $userData;
        } else {
            $data['userData'] = [];
        }

        return view('profile.edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $user = Auth::user();

        $user->name=$request->name;
        $user->surname=$request->surname;
        $user->username=$request->username;
        $user->email=$request->email;
        if($request->filled('password')) {
            $user->password= bcrypt($request->password);
        }
        $user->telephone=$request->telephone;
        $user->address=$request->address;

        if ($user->save()) {
            return redirect()->route('profile.edit')->with('status', 'Éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = User::find($id);
        

        if($user) {
            $data['userData'] = $user;
        } else {
            $data['userData'] = [];
        }

        return view('profile.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
