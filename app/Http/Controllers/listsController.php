<?php

namespace App\Http\Controllers;

use App\Lista;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class listsController extends Controller
{

    protected $table = 'list_info';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::check()){
            $id = Auth::user()->id ;
            $listas = DB::table('list_info')->where('user_id',Auth::user()->id)->get(); //Obtengo todas las listas del usuario
            return view('lists.index',compact('listas','id')); //devuelvo una view junto con las listas
        }
        else{
            //es un guest mirando otro usuario, buscar lista del usuario visitado
        }
        
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
            'titulo' => ['required', 'min:5', 'max:255'],
            'listaDescripcion' => ['required', 'min:5', 'max:255']
        ]);
        
        

        $user->addList(request('titulo'), request('listaDescripcion'), request('public'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(Lista $lista)
    {
        
       return view('lists/{ {{lista->id}} }', compact('lista'));
       //return view('verLista')->with('lista',$listaShow);

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
