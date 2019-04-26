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
	
	//HAY QUE MOSTRAR LAS PELIS EN SHOWLIST Y LISTO 
	public function store(Usermovie $usermovie){
	//	dd($usermovie->id);
		/*
		   Movie::create(request()->validate([
            'titulo' => 'required',
            'director' => 'required'
        ]));
		*/
		Movie::create([
           	'titulo' => request('titulo'),
			'director' =>  request('titulo'),
			'lista' => $usermovie->id
			
        ]);
		
	//	return $Request;
		
		return redirect()->route('lists.show', ['usermovie'=> $usermovie]);
	}

}
