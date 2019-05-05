<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use App\Http\Request;*/
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Laracast\Flash\Flash;
class UserController extends Controller
{
    /** $users= User::orderBy('id','ASC')-> paginate(5);
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $users= User::all();
        return view('ListasPublicas')->with('users',$users);*/
        $users = DB::select('select * from users', [1]);

        return view('ListasPublicas', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
       $user=User::find($id);
       $nomB=true;
       $emailB=true;
       $nombreUsados = DB::select('select name from users where id != :id ', ['id'=> $id]);
       $mailUsados = DB::select('select email from users where id != :id ', ['id'=> $id]);
       $nombreNuevo=$request->name;
       $emailNuevo=$request->email;
      foreach ($nombreUsados as $nombre)
      {
      
        if(strcmp($nombre->name, $nombreNuevo) === 0)
             $nomB=false;
       
      }
      foreach ($mailUsados as $email)
      {
        if(strcmp($email->email, $emailNuevo) === 0)
                $emailB=false;

      }
     
      if($nomB==true && $emailB==true)
        {
            $user->name=$request->name;
            $user->email=$request->email;
            $user->save();
        }
        
        flash('asdasda')->success();  
        return redirect('/home');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user=User::find($id);
        return view('/auth/edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       /* $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect('/home');*/
        return "Entre al updateeeeeeeeeeeeeeeee";
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
