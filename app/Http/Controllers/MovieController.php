<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class MovieController extends Controller
{
    public function index(){
		
		$listas= DB::table('user_movie')->get();

	//	if (request()->has('empty')) {
    //        $users = [];
     //   } else {
     //       $movies = [
     //           'Titanic', 'Memento', 'Batman', 'Los simpsons', 'Kill Bill',
     //       ];
     //   }
	 
	 
		
	return view('home', ['listas'=> $listas, 
						  'title'=> 'Listas públicas ']); 
	}

	public function show($id){
		return view('lists.showlist',compact('id'));
	}
	
	public function create(){
		return view('lists.createlist');
}
	
/*	public function store(){
	   $data =request()->all();
		
	   List::create([
            'name' => $data['nombre'],
            'email' => $data['correo'],
			
        ]);
		
		return redirect()->route('users.index');
	}
	*/
}
