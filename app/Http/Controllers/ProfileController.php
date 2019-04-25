<?php

namespace Listbook\Http\Controllers;

use Illuminate\Http\Request;
use Listbook\User;

class ProfileController extends Controller
{
    public function show(User $user) {
        return view('pages.profile',compact('user'));
    }
}
