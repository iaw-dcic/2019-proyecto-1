<?php

namespace Haiku\Http\Controllers\song;
use Auth;
use Illuminate\Http\Request;
use Haiku\Http\Controllers\Controller;
use Haiku\song;
use Haiku\Album;
use Validator;
use Illuminate\Support\Facades\Input;

class SongController extends Controller
{
    //
    public function index($id){
        //vuelvo a chequear que el usuario tenga permisos de hacer cambios... 
        $user = Auth::user();
        Auth::login($user,true);
        return View('songs.create',['id'=>$id]);
    }

    //muestra la canción a editar... 

    public function editSong($id){
        $user = Auth::user();
        $song = Song::find($id);
        $album = Album::find($song->album_id);
        if(!$user ||  $user->id != $album->user_id  )
            return redirect()->route('home');
        return View('songs.edit',['song'=>$song]);
    }


    public function displaySongs($id){
        //retorna todas las canciones del album con $id pasado por parametro
        $user = Auth::user();
        $album = Album::find($id);
        if(!$user ||  $user->id != $album->user_id  )
            return redirect()->route('home');
        $songs= $album->songs;
        return View('songs.display',['songs'=>$songs,'album'=>$album]);
    }

    public function updateSong(Request $request){
        //dd($request);
        $user = Auth::user();
        $rules = array(
            'song'       => 'required',
            'link'      => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) 
            return Redirect::back()->withInput(Input::all())->withErrors($validator);;


        $song = Song::find(Input::get('id'));
        $song->song_name =  Input::get('song');
        $song->link = Input::get('link');
        $song->save();
        $album = Album::find($song->album_id);
        $songs= $album->songs;
        return View('songs.display',['songs'=>$songs,'album'=>$album]);


    }

    public function destroySong($id){
        $song = Song::find($id);
        $album_id = $song->album_id;

        //Comprobar que sea el usuario correcto 
        $user = Auth::user();
        $album = Album::find($album_id);
        if(!$user ||  $user->id != $album->user_id  )
            return redirect()->route('home');



        $song->delete();
        return redirect()->route('displaySongs',  ['id' => $album_id]);
      
        }

    


    //Faltan las validaciones del lado del servidor....
    public function addSongs(Request $request){
        //dd($request);
        $user = Auth::user();
        $j = $request->input('varId');
        $albumId = $request->input('albumId');
        $album = Album::find($album_id);
        if(!$user ||  $user->id != $album->user_id  )
            return redirect()->route('home');


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
            
        }
        return redirect()->route('profile');




        
    }
}
