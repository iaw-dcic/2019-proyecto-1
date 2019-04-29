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
    public function index(Request $request)
    {
        
        if(Auth::check()){
            $name = Auth::user()->name ;
            $listas = DB::table('listas')->where('user_id',Auth::user()->id)->get(); //Obtengo todas las listas del usuario
            return view('lists.index',compact('listas','name')); //devuelvo una view junto con las listas
        }    
    }

    public function accederListasAjenas(){
        
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
        return view('lists.show',compact('lista','juegos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(Lista $lista)
    {
        $this->middleware('auth');
        return redirect('lists.edit',compact('lista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lista $lista)
    {
        $this->middleware('auth');

        $lista->update( request('titulo','listaDescripcion','public','userID')); 
        return redirect('profiles/{ {{Auth::user()->id}} }');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista)
    {
        $this->middleware('auth');
        $lista->delete();
        return redirect('lists');
    }

   

    //return request()->all(); //devuelve todos los datos a la pagina (token incluido)
}
