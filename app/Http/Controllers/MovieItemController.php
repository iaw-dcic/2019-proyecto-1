<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Usermovie;
use App\User;
use Auth;
use MovieController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieItemController extends Controller
{
	
    public function index(){	//me muestra TODAS LAS PELICULAS DE TODAS LAS LISTAS
		
	 $pelis = Movie::all();
		
	return view('lists.showlist', ['pelis'=> $pelis, 
						  'title'=> 'Peliculas ']); 
	}

	public function create(Usermovie $usermovie){
		$auth_id =  Auth::id();
		$listas = Usermovie::all();
		$user= User::all();
		 
		if($auth_id==$usermovie->creador_id)
			return view('movie.createmovie', ['usermovie'=> $usermovie]); //tengo q hacer vista de peli
		else
			return view('home', ['listas'=> $listas, 
						  'title'=> 'Listas públicas ',
						  'users' => $user]); 
	}

	public function store(Usermovie $usermovie){
		Movie::create([
           	'titulo' => request('titulo'),
			'director' =>  request('director'),
			'año' =>  request('año'),
			'lista' => $usermovie->id
        ]);
		
		return redirect()->route('lists.show', ['usermovie'=> $usermovie]);
	}
	
	public function destroy(Usermovie $usermovie, Movie $movie){
		$auth_id =  Auth::id();
		$listas = Usermovie::all();
		$user= User::all();
		
		if($auth_id==$usermovie->creador_id){
			$movie->delete();
			return redirect()->route('lists.show',  ['usermovie'=> $usermovie, 
												'movie'=> $movie]);
		}
		else
			return view('home', ['listas'=> $listas, 
						  'title'=> 'Listas públicas ',
						  'users' => $user]); 
	}
	
	public function edit(Usermovie $usermovie, Movie $movie){
		$auth_id =  Auth::id();
		$listas = Usermovie::all();
		$user= User::all();
		
		if($auth_id==$usermovie->creador_id)
			return view('movie.editmovie', ['usermovie'=> $usermovie, 
												'movie'=> $movie]);
		else
			return view('home', ['listas'=> $listas, 
						  'title'=> 'Listas públicas ',
						  'users' => $user]); 
	}
	
	public function update(Usermovie $usermovie, Movie $movie){

		$movie->titulo = request('titulo');
        $movie->director = request('director');
		$movie->año = request('año');
		$movie->lista = $usermovie->id;
		
        $movie->save();
		
		return redirect()->route('lists.show', ['usermovie'=> $usermovie, 
												'movie'=> $movie]);
	}
	
}
