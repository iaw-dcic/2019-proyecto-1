<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Usermovie;
use Auth;
use MovieController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MovieItemController extends Controller
{
	
    public function index(){	//me muestra TODAS LAS PELICULAS DE TODAS LAS LISTAS
		
	//	$listas= DB::table('usermovies')->get();
	 $pelis = Movie::all();
		
	//	if (request()->has('empty')) {
    //        $users = [];
     //   } else {
     //       $movies = [
     //           'Titanic', 'Memento', 'Batman', 'Los simpsons', 'Kill Bill',
     //       ];
     //   }
	 
	 
	 //ACA ACOMODAR
	 
		
	return view('lists.showlist', ['pelis'=> $pelis, 
						  'title'=> 'Peliculas ']); 
	}

//	public function show($usermovie){
//		$movie= Movie::find(lista->$usermovie);
//		return view('lists.show',compact('movie')); //tengo q hacer vista de peli
//	}

	public function create(Usermovie $usermovie){
		return view('movie.createmovie', ['usermovie'=> $usermovie]); //tengo q hacer vista de peli
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
	
	//	$lista= Usermovie::find($usermovie);
		
	//	$peli=Movie::where('lista',$lista->id)
	//				->where('id',$movie)
	//				->get();
					
		$movie->delete();

		return redirect()->route('lists.show',  ['usermovie'=> $usermovie, 
												'movie'=> $movie]);
	}
	
	public function edit(Usermovie $usermovie, Movie $movie){
		return view('movie.editmovie', ['usermovie'=> $usermovie, 
												'movie'=> $movie]);
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
