<?php

namespace Haiku\Http\Controllers\song;
use Auth;
use Illuminate\Http\Request;
use Haiku\Http\Controllers\Controller;
use Haiku\song;

class SongController extends Controller
{
    //
    public function index($id){
        //vuelvo a chequear que el usuario tenga permisos de hacer cambios... 
        $user = Auth::user();
        Auth::login($user,true);
        return View('songs.create',['id'=>$id]);
    }

    //Faltan las validaciones del lado del servidor....
    public function addSongs(Request $request){
        //dd($request);
        $j = $request->input('varId');
        $albumId = $request->input('albumId');
        //SE PUEDE OPTIMIZAR PERO SE DEJA ASÍ POR CUESTIONES DE LEGIBILIDAD...  
        //leo todos los inputs dinámicos para canciones y para links y los guardo en la base de datos...
        for ($i = 0; $i <= $j; $i++) {
            $aux = 'song';
            $aux2 = 'link';
            if($i!=0){
                $aux = $aux.$i;
                $aux2 = $aux2.$i;

            }
            $song = $request->input($aux);
            $link = $request->input($aux2);
            //Inserción en la base de datos... 
            $songToDb = new song();
            $songToDb->album_id = $albumId;
            $songToDb->song_name = $song;
            $songToDb->link = $link;
            $songToDb->save();
            return redirect()->route('profile');
            
        }



        
    }
}
