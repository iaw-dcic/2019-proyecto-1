<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class editProfileController extends Controller{

    public function __construct(){
        
        $this->middleware('auth');
    }

    public function editProfile(){
        return view('editProfile');
    }
}
