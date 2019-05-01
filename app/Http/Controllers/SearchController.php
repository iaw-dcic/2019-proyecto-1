<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Movie;
use App\Usermovie;
use Illuminate\Http\Request;

class SearchController extends Controller
{

	
   public function search(){
		$users = User::where('name', 'like', '%'.request('nombre').'%')->get();
		
	
			return view('search', ['users'=> $users]);
		}
	
}