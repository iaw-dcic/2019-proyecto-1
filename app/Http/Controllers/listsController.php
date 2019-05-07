<?php

namespace App\Http\Controllers;

use App\Lista;
use App\User;
use App\Juego;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class listsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->only(['create','edit','update','destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::check()){
            $name = Auth::user()->name ;
            $listas = Lista::where('user_id',Auth::user()->id)->get(); //Obtengo todas las listas del usuario
            return view('lists.index',compact('listas','name')); //devuelvo una view junto con las listas
        }    
    }

    /*
    * Dado un usuario, listo las listas públicas del usuario al que se esta accediendo
    */
    public function accederListasAjenas(int $id){
        $listas = DB::table('listas')->where([ ['user_id', "=", $id], ['public',"=",1] ])->get();
     
        $name = User::find($id)->name;
        abort_if($lista[0]->public == 0 &&  ($idUsuario != auth()->id() || $idUsuario == "guest"), 403);
        return view('lists.index',compact('listas','name')); //devuelvo una view junto con las listas

    }

    /*
    * NO SE SI ES UNA LISTA PUBLICA DEL USUARIO $idUsuario
    * Esto se acciona cuando DESDE eL PERFIL DE UN USUARIO AJENO, se ingresa a las listas y se hace clic en una lista
    */
    public function accederDatosListaAjena(String $nomUsuario, int $idLista){


        $idUsuario = DB::table('users')->where('name', $nomUsuario)->get();
        $idUsuario = $idUsuario[0]->id;
     
        $lista = Lista::where([ ['id', "=", $idLista], ['user_id', "=", $idUsuario] ])->get();
        abort_if($lista[0]->public == 0 &&  ($idUsuario != auth()->id() || $idUsuario == "guest"), 403);
        $juegos = Juego::where('list_id',$lista[0]->id)->get();
        $name = User::find($idUsuario)->name;
        return view('lists.show',compact('lista','juegos','idUsuario','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
  
        $validated = request()->validate([
            'name' => ['required', 'min:5', 'max:255', 'unique:listas'],
            'listaDescripcion' => ['required', 'min:5', 'max:255']
        ]);
        $public = 0;
        if(Input::get('public') == 'on')
            $public = 1;
        

        $lista = new Lista;
        $lista->user_id=auth()->id();
        $lista->name=Input::get('name');
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
        
        $lista = Lista::where('id',$id)->get();
        $juegos = DB::table('juegos')->where('list_id',$lista[0]->id)->get();
       
        if(Auth::check())
            $idUsuario = Auth::user()->id;
        else
            $idUsuario = "guest";

        abort_if($lista[0]->public == 0 &&  ($idUsuario != auth()->id() || $idUsuario == "guest"), 403);
        $idUsuarioAccediendo = DB::table('users')->where('id',$lista[0]->user_id)->get();
        $idUsuarioAccediendo = $idUsuarioAccediendo[0]->id;
        if($idUsuario == $idUsuarioAccediendo){
       
            $name = User::find($idUsuario)->name; 
            return view('lists.show',compact('lista','juegos','idUsuario','name'));
        }
        else{
        
            $idUsuario = $idUsuarioAccediendo;
            $name = User::find($idUsuario)->name; 
            abort_if($lista[0]->public == 0, 403 );
            return view('lists.show',compact('lista','juegos','idUsuario','name'));
        }

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
  
        return view('lists.edit')->with('listaId',$listaId)->with('list',$lista[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {


        $public = 0;
        if(Input::get('public') == 'on')
            $public = 1;

        $userName= Auth::user()->name;
        
        $lista = Lista::findOrFail(request('listId'));
        
        if(Input::get('name') != ""){
            
            $validated = request()->validate([
                'name' => ['min:5','max:255', 'unique:listas'] ]);
            $lista->name=Input::get('name');
        }
        
        if(Input::get('listaDescripcion') != ""){

            $validated = request()->validate([
                'listaDescripcion' => ['min:5', 'max:255']
            ]);
            $lista->description=Input::get('listaDescripcion');
        }
       
        $lista->public=$public;
        $lista->save();
        return redirect('/lists');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $ListaId)
    {
      
        
        $lista = Lista::findOrFail(request('listId'));
        $lista->delete();
        return redirect('/lists');
    }

}
