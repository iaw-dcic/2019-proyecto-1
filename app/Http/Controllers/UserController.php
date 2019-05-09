<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /** $users= User::orderBy('id','ASC')-> paginate(5);
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('GaleriaPelitecas', ['users' => $users]);
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
    public function show($id)
    {
        //
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
        return view('/auth/perfil')->with('user',$user);
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
        $user=User::find($id);
        //Setea los default.
        $nomDefault=$user->name;
        $apelDefault=$user->lastname;
        //Auxiliares para chequear el email.
        $emailB=true;
        $mailUsados = DB::select('select email from users where id != :id ', ['id'=> $id]);
        $emailNuevo=$request->email;
        //Name
        if($request->name==null){
            $user->name=$nomDefault;
        }
        else{
            $user->name=$request->name;
        }
        //Lastname
        if($request->lastname==null){
            $user->lastname=$apelDefault;
        }
        else{
            $user->lastname=$request->lastname;
        }
        //Mail
        foreach ($mailUsados as $email)
        {
            if(strcmp($email->email, $emailNuevo) === 0)
                    $emailB=false;
        }
        if($emailB==true)
        {
            $user->email=$request->email;
            $user->save();
        }
        
        return back();
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
