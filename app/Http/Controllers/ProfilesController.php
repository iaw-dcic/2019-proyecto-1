<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;


class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {

        $user=User::find(auth()->id());
        return view('profile.createProfile')->with('usr',$user->name);
    }

    public function store(Request $request)
    {
        $request->validate([
            'acerca_de'=>['max:300'],
        ]);


        $new_profile=new Profile();
        
        $new_profile->user_id=auth()->id();
        $new_profile->acerca_de=$request->acerca_de;

        //imagen
        
        if($request->imagen)
        {
            $file = $request->imagen;
            $extension=$file->getClientOriginalExtension();
            $name='misLibros_' . time().'.'.$extension;
            $path= public_path().'/images/profiles/';
            $file->move($path,$name);
            $new_profile->imagen= $name;
        }
        
       
        


        $new_profile->save();

        return redirect()->route('listas.index');
    }


    public function edit()
    {
         $user=User::find(auth()->id());
         $profile=User::find(auth()->id())->profile;
        return view('profile.editProfile')->with('usr',$user->name)->with('profile',$profile);
    }

    public function update(Request $request)
    {
        $request->validate([
            'acerca_de'=>['max:300'],
        ]);


        $user=User::find(auth()->id());
        $profile=$user->profile;
        $user->name=$request->nombre;
    	
        $profile->acerca_de=$request->acerca_de;

        //imagen
        
        if($request->imagen)
        {
            $file = $request->imagen;
            $extension=$file->getClientOriginalExtension();
            $name='misLibros_' . time().'.'.$extension;
            $path= public_path().'/images/profiles/';
            $file->move($path,$name);
            $profile->imagen= $name;
        }
        $profile->save();
        $user->save();
        return redirect('/public/'.$user->name);
    }

}
