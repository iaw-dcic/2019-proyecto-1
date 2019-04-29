<?php

namespace App\Http\Controllers;
use App\Usermovie;
use App\User;
use Auth;
use App\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
		
	//	$listas= DB::table('usermovies')->get();
	 $listas = Usermovie::all();
	 $user= User::all();
	
	//	if (request()->has('empty')) {
    //        $users = [];
     //   } else {
     //       $movies = [
     //           'Titanic', 'Memento', 'Batman', 'Los simpsons', 'Kill Bill',
     //       ];
     //   }

		
	return view('home', ['listas'=> $listas, 
						  'title'=> 'Listas públicas ',
						  'users' => $user]); 
	}

	public function show($id){
		$usermovie= Usermovie::find($id);
		
		$pelis=Movie::where('lista',$usermovie->id)->get();

		return view('lists.showlist',['pelis'=> $pelis, 'usermovie'=> $usermovie]);
	}
	
	public function create(){
		return view('lists.createlist');
}
	
	public function store(){
		$user = Auth::user();
		
		request()->validate([
			'nombre' => ['required', 'min:3'],
		]);
		
	   Usermovie::create([
           	'nombre' => request('nombre'),
			'creador_id' => auth()->id(),
			
        ]);
	/*	
		Movie::create([
           	'titulo' => request('titulo'),
			'director' =>  request('titulo'),
			'lista' =>  Usermovie-> id()
			
        ]);
		*/
		
/*		
		$userList = Usermovie::findOrFail(auth()->id());
		$userList->addMovie(
					request()->validate(
						['titulo' => 'required', 
						'director' => 'required']));
		
		Usermovie::create($attributes);
		*/
		return redirect('/home');;
	}
	
	public function edit(Usermovie $usermovie){
		return view('lists.editlist', ['usermovie'=> $usermovie]);
	}
	
	public function update(Usermovie $usermovie){
		$usermovie->nombre = request('nombre');
		
        $usermovie->save();
		
		return redirect()->route('lists.show', ['usermovie'=> $usermovie]);
	}
	
	public function destroy(Usermovie $usermovie){
	
	//	$lista= Usermovie::find($usermovie);
		
		$peli=Movie::where('lista',$usermovie->id)->get();
		
		foreach ($peli as $movie){
			$movie->delete();
		}
		
		$usermovie->delete();
		
		//Para ir otra vez a home
		$listas = Usermovie::all();
		$user= User::all();
		
		return view('home', ['listas'=> $listas, 
						  'title'=> 'Listas públicas ',
						  'users' => $user]);
	}
	

}
