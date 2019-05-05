<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class profileController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only(['edit','update','destroy']);
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(String $nameUs)
    {
       
        $nameac = DB::table('users')->where('name',$nameUs)->get();
        if(Auth::check())
            $name = Auth::user()->name;
        else
            $name = 'guest';
        if( $nameUs == $name){ //el usuario que entró es el creador de su cuenta
            $name= Auth::user()->name;
            $surname = User::findOrFail(Auth::user()->id)->surname;
            return view('profiles.show')->with('name',$name)->with('surname',$surname);
        }
        else{
            $name = $nameac[0]->id; 
            $entrada = "guest";
            $surname = $nameac[0]->surname;
            return view('profiles.show')->with('name',$nameUs)->with('idActual',$name)->with('loggedIn',$entrada)->with('surname',$surname); //es un usuario externo
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     *
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
        if(Input::get('name') != ""){
           
            $validated = request()->validate([
                'name' => ['unique:users','string', 'max:255',]
            ]);    
            $user->name = Input::get('name');
        }
         
        
        if(Input::get('email') != ""){
            $validated = request()->validate([
                'email' => ['string', 'email', 'max:255', 'unique:users'] ]); 
                $user->email = Input::get('email');
        }
          
        
        if(Input::get('surname') != ""){
            
            $validated = request()->validate([
                'surname' => ['string', 'max:255'] ]); 
            $user->surname = Input::get('surname');
        }
           
        $user->save();
        return redirect('/');        
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect('/');
    }
}
