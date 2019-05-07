<?php 
namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use Auth;
use App\Articulo;
use App\Lista;
use DB;

class ListaController extends Controller
{
    
		 public function mis_listas(){
	        $user=Auth::user();
	        $listas=DB::table('lista')->where('user_id','=',$user->id)->get();
	        
	        $data = array('user' => Auth::user(),
                      'listas' => $listas);
        return view('mis_listas', $data);
    	}


    	public function crear_lista(Request $request){

	        $user=Auth::user();
    		     if (!is_null($user))
            		return view('crear_lista');
         		else
            		return view('auth/login');

    }
}	




?>