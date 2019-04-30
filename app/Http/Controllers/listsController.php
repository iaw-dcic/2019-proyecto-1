<?php

namespace App\Http\Controllers;

use App\Lista;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class listsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::check()){
            $name = Auth::user()->name ;
            $listas = DB::table('listas')->where('user_id',Auth::user()->id)->get(); //Obtengo todas las listas del usuario
            return view('lists.index',compact('listas','name')); //devuelvo una view junto con las listas
        }    
    }

    public function accederListasAjenas(int $id){
        $listas = DB::table('listas')->where([ ['user_id', "=", $id], ['public',"=",1] ])->get();
        $name = User::find($id)->name;
        return view('lists.index',compact('listas','name')); //devuelvo una view junto con las listas

    }

    /*
    * SE QUE ES UNA LISTA PUBLICA DEL USUARIO $idUsuario
    */
    public function accederDatosListaAjena(String $nomUsuario, int $idLista){

        $idUsuario = DB::table('users')->where('name', $nomUsuario)->get();
        $idUsuario = $idUsuario[0]->id;
        $lista = DB::table('listas')->where([ ['id', "=", $idLista], ['user_id', "=", $idUsuario] ])->get();
        $juegos = DB::table('juegos')->where('list_id',$lista[0]->id)->get();
        return view('lists.show',compact('lista','juegos','idUsuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('auth');
        return view('lists/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->middleware('auth');

        $validated = request()->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'listaDescripcion' => ['required', 'min:5', 'max:255']
        ]);
        $public = 0;
        if(Input::get('public') == 'on')
            $public = 1;
        

        $lista = new Lista;
        $lista->user_id=Input::get('userID');
        $lista->name=Input::get('title');
        $lista->description=Input::get('listaDescripcion');
        $lista->public=$public;
        
        $lista->save();

        //$user->addList($titulo, $descripcion, $public);
        return redirect('lists');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        
        $lista = DB::table('listas')->where('id',$id)->get();
        $juegos = DB::table('juegos')->where('list_id',$lista[0]->id)->get();
        $idUsuario = Auth::user()->id;
        $idUsuarioAccediendo = DB::table('users')->where('id',$lista[0]->user_id)->get();
        $idUsuarioAccediendo = $idUsuarioAccediendo[0]->id;
        if($idUsuario == $idUsuarioAccediendo)
            return view('lists.show',compact('lista','juegos','idUsuario'));
        else
            $idUsuario = $idUsuarioAccediendo;
            return view('lists.show',compact('lista','juegos','idUsuario'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(int $listaId)
    {
   
        $lista= DB::table('listas')->where('id',$listaId)->get();
        $this->middleware('auth');
        return view('lists.edit')->with('listaId',$listaId)->with('list',$lista[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $this->middleware('auth');
        $public = 0;
        if(Input::get('public') == 'on')
            $public = 1;

        $userName= Auth::user()->name;
        
        $lista = Lista::findOrFail(request('listId'));
        $lista->name=Input::get('titulo');
        $lista->description=Input::get('listaDescripcion');
        $lista->public=$public;
        $lista->save();
        return view('profiles.show')->with('name',$userName);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $ListaId)
    {
        $this->middleware('auth');
        $lista = Lista::findOrFail(request('listaId'));
        $juegos = DB::table('juegos')->where('list_id',$lista->id)->get();
        $lista->delete();
        return redirect('lists');
    }

}
