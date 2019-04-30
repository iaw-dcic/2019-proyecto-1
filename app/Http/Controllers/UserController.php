<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    //
    public function profile(){
    	return view('perfil', array('user'=> Auth::user()));
    }

    public function get_id(){
        return $this->id;
    }

    public function update_profile(Request $request){
    	$user=Auth::user();
        if($request->hasFile('avatar')){
    		$avatar=$request->file('avatar');
    		$filename=time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(250,250)->save(public_path('/uploads/avatars/'.$filename));
    		
    		$user->avatar=$filename;
    		
    	}
        
        
         $name = $request->input('name');
       
       
        if(!is_null($name)){
            $user->name=$name;
        }
        $user->save();
        //dd($request->all());
        return view('perfil', array('user'=> Auth::user()));

    }
}
