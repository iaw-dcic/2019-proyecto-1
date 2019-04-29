<?php

namespace Haiku\Http\Controllers;

use Haiku\Album;
use Illuminate\Http\Request;
use Haiku\User;
use Auth;



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
        //faltan agregar las reglas de validación del lado cliente...!!

        //dd($request);
        $user  = Auth::user();
        $album = new Album;
        $album->user_id = $user->id;
        $album->public = request('visibility');       
        $album->name = request('name');
        $album->bandName = request('band');
        $album->description = request('coment');  
        $album->link = request('youtubeLink');
        $album->save();
        
        //return View('album.index');
        return redirect()->action(
            'AlbumController@index'
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \Haiku\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Haiku\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Haiku\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $nerd = Nerd::find($id);
        $nerd->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return redirect()->action(
            'ApiController@profile'
        );

    }
}
