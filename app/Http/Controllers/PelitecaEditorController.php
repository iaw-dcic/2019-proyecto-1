<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Request\PelitecaEditorFormRequest;
use App\Genero;
use App\Pelicula;

class PelitecaEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $this->middleware('auth');
        $userLog=Auth::user();
        if($userLog->id != $id)
            abort(403, 'Usuario no autorizado');
        $userAsked=User::find($id);
        $puntajes = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        $caters = Genero::all();
        $peliculas = $userAsked->getPeliculas()->get();
        return view('PelitecaEditor', ['puntajes' => $puntajes ,'caters' => $caters ,'peliculas' => $peliculas ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->middleware('auth');
        $pelicula = Pelicula::find($id);
        $user = User::find($pelicula->user_id);
        if(Auth::user()->id == $user->id){
            $pelicula->publico = !($pelicula->publico);
            $pelicula->save();
        }
        else{
            abort(403,'Usuario no autorizado');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('auth');
        $pelicula = Pelicula::find($id);
        $user = User::find($pelicula->user_id);
        if(Auth::user()->id == $user->id){
            $pelicula->delete();
        }
        else{
            abort(403,'Usuario no autorizado');
        }
        return back();
    }
}
