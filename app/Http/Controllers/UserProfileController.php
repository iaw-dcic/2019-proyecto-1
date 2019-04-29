<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller {

    public function index () {}
    public function create () {}
    public function store (Request $request) {}

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show (String $name) {
        $user = User::where('name', $name)->first();

        return view('profiles.showProfile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit (String $name) {
        $user = User::where('name', $name)->first();

        return view('profiles.editProfile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * The only values the user is able to change are, email privacy, first name and it's privacy,
     * and last name and it's privacy.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, String $name) {
        $user = User::where('name', $name)->first();

        $user->update(request(['email_public', 'first_name', 'first_name_public', 'last_name', 'last_name_public']));

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy (String $name) {
        $user = User::where('name', $name)->first();

        $user->delete();

        return redirect('/');
    }
}