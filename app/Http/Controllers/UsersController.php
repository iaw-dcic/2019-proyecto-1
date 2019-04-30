<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        if (!is_null($user))
            return view('users.user')->withUser($user);
        else {
            $data = [
                "error_type" => "Show user",
                "description" => "The user you're trying to access doesn't exist.",
            ];
            return view('error')->withData($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $data = [
            "id" => $user->id,
            "name" => $user->name,
            "description" => $user->description,
            "email" => $user->email,
        ];
        return view('users.edit')->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        if($request->description)
            $user->description = $request->description;
        else $user->description = '';
        if ($request->avatar){
            $imageTempName = $request->file('avatar')->getPathname();
            $imageName = $request->file('avatar')->getClientOriginalName();
            $path = base_path() . '/public/images/';
            $request->file('avatar')->move($path , $imageName);
            $data=array('media'=>$imageName);
            $user->avatar = $request->file('avatar')->getClientOriginalName();
        }
        $user->save();
        $data = [
            "operation" => "Update User",
            "description" => "Your profile was updated successfully.",
        ];
        return view('success')->withData($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
    }
}
