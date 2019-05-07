<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use App\Usermovie;
use App\Movie;
use Illuminate\Support\Facades\Validator;

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
						  'title'=> 'Comunidad']); 
	}

	public function show($id){
		$user= User::find($id);
		$pelis= Usermovie::where('creador_id',$id)->get();
		
//		dd($user);	
		return view('users.show',['user'=> $user, 'pelis'=> $pelis]);
	}
	
	public function create(){
	$auth_id =  Auth::id();
	$listas = Usermovie::all();
	$useres= User::all();
	
		if($auth_id>0)
			return view('home', ['listas'=> $listas, 
						  'title'=> 'Listas públicas ',
						  'users' => $useres	]); 
		else
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
	$auth_id =  Auth::id();
	$listas = Usermovie::all();
	$useres= User::all();
	
		if($auth_id==$user->id)
			return view('users.editar', ['user'=> $user]);
		else
			return view('home', ['listas'=> $listas, 
						  'title'=> 'Listas públicas ',
						  'users' => $useres	]); 
	}
	
	public function update(User $user){
	
		$user->name = request('nombre');
        $user->email = request('correo');
		$user->password = bcrypt(request('clave'));
        $user->save();
		
		return redirect()->route('users.show', ['user'=> $user]);
	}
	
	  public function search()
    {
        $nombre = Input::get('nombre');
		
        $user = User::where('name','like','%nombre%')->get();
		
		//$pelis=Usermovie::where('creador_id',$user->id)->get();
		
		return  redirect()-> route('users.show', ['user'=> $user]);
    }
	
	function destroy(User $user) {
		
		$lista=Usermovie::where('creador_id', $user->id)->get();
		
		foreach ($lista as $usermovie){
		$peli=Movie::where('lista',$usermovie->id)->get();
		
			foreach ($peli as $movie){
				$movie->delete();
			}
			
			$usermovie->delete();
		}
		
		$user->delete();

		$listas = Usermovie::all();
		$user= User::all();
		
		return view('home', ['listas'=> $listas, 
						  'title'=> 'Listas públicas ',
						  'users' => $user]);
	}
}
