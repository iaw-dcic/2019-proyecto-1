<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Profile;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function inicio()
    {
        $listaDeBienes = ['bien1', 'bien2'];
        return view('index', compact('listaDeBienes'));
    }

    public function editProfile()
    {   
        $profile = Profile::query()->where('user_id', Auth::user()->id)->first();
        return view('profile/edit-profile',compact('profile'));
    }
}
