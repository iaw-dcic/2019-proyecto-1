<?php

namespace App\Http\Controllers;
use App\User;
use App\Usermovie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
		
	//	$users= DB::table('users')->get();
	
	 $users = User::all();
	
	//	if (request()->has('empty')) {
    //        $users = [];
     //   } else {
         //   $users = [
           //     'Joel', 'Ellie', 'Tess', 'Tommy', 'Bill',
           // ];
     //   }
		
	return view('users.index', ['users'=> $users, 
						  'title'=> 'Listado de usuarios']); 
	}

	public function show($id){
		$user= User::find($id);
		$pelis= Usermovie::where('creador_id',$id)->get();
		
//		dd($user);	
		return view('users.show',['user'=> $user, 'pelis'=> $pelis]);
	}
	
	public function create(){
	  return view('users.create');
	}
	
	public function login(){  
		return view('users.login');	
	}
	
	public function store(){
		$data =request()->all();
		
	   User::create([
            'name' => $data['nombre'],
            'email' => $data['correo'],
            'password' => bcrypt($data['clave'])
        ]);
		
		return redirect()->route('users.index');
	}
	
	public function edit(User $user){
		return view('users.editar', ['user'=> $user]);
	}
	
	public function update(User $user){
	
		$user->name = request('nombre');
        $user->email = request('correo');
		$user->password = bcrypt(request('clave'));
        $user->save();
		
		return redirect()->route('users.show', ['user'=> $user]);
	}
	
	function destroy(User $user) {
		$user->delete();

    return redirect()->route('home');
	}
}
