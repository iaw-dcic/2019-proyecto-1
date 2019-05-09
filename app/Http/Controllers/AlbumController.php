<?php

namespace Haiku\Http\Controllers;

use Haiku\Album;
use Illuminate\Http\Request;
use Haiku\User;
use Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;




class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $albums = Album::all();
        return View('album.index',['albums'=>$albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user){
            Auth::login($user,true);
            return View('album.create');
        }
        else
          return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
            'band'      => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) 
            return Redirect::back()->withInput(Input::all())->withErrors($validator);;

        
        
        //dd($request);
        $user  = Auth::user();
        if(!$user)
        return redirect()->route('home');
        $album = new Album;
        $album->user_id = $user->id;
        $album->public = request('visibility');       
        $album->name = request('name');
        $album->bandName = request('band');
        $album->description = request('coment');  
        $album->save();
        //return View('album.index');
        return redirect()->route('createSongs', ['id' => $album->id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \Haiku\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $album = Album::find($id);
        return View('album.showAlbum',['album'=>$album]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Haiku\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user  = Auth::user();
        if(!$user)
        return redirect()->route('home');
        $album = Album::find($id);
        return View('album.edit',['album'=>$album]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Haiku\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $rules = array(
            'name'       => 'required',
            'band'      => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) 
            return Redirect::back()->withInput(Input::all())->withErrors($validator);;
            $user  = Auth::user();

            if(!$user)
            return redirect()->route('home');

        

        
      $album =Album::find(Input::get('id'));
      $album->name = Input::get('name');
      $album->bandName = Input::get('band');
      $album->public = Input::get('visibility');
      $album->description = Input::get('coment');  
      $album->save();
      
      //$album->update(request(['name','band','visibility','coment','youtubeLink']));
      return redirect()->action(
        'ApiController@profile'
    );

 
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user  = Auth::user();
        $album = Album::find($id);
        if(!$user || $album->user_id != $user->id)
            return redirect()->route('home');
        foreach($album->songs as $song)
            $song->delete();
        $album->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect()->action(
            'ApiController@profile'
        );

    }
}
