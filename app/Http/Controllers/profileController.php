<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class profileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(String $nameUs)
    {
        $nameac = DB::table('users')->where('name',$nameUs)->get();
        $name = Auth::user()->name;
        if( ($nameac[0]->name) == $name){ //el usuario que entró es el creador de su cuenta
            $name= Auth::user()->name;
            $surname = User::findOrFail(Auth::user()->id)->surname;
            return view('profiles.show')->with('name',$name)->with('surname',$surname);
        }
        else{
            $name = $nameac[0]->id; 
            $nameac = $nameac[0]->name;
            dd($name, $nameac);
            return view('profiles.show')->with('name',$nameac)->with('idActual',$name); //es un usuario externo
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(String $userName)
    {
        $user = Auth::user();
        return view('profiles.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::findOrFail(Auth::user()->id);
        if(Input::get('name') == "")
            $user->name = Auth::user()->name;
        else
            $user->name = Input::get('name');
        
        if(Input::get('email') == "")
            $user->email = Auth::user()->email;
        else
            $user->email = Input::get('email');
        
        if(Input::get('surname') == "")
            $user->surname = $user->surname;
        else
            $user->surname = Input::get('surname');

        $user->save();
        return view('welcome');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect('/');
    }
}
