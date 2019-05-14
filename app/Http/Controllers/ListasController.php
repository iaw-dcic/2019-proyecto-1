<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;
use App\User;
use App\Libro;
class ListasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr= User::find(auth()->id());
        $listas = User::find($usr->id)->listas;
        return view('lista.misListas',['usr'=> $usr->name])->with('listas',$listas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('lista.createLista')->with('usr',auth()->user()->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'nombre' => ['required','min:3','max:20'],
            
            'visibilidad' => ['required']
        
        ]);

        $user_name=User::find(auth()->id())->name;


        $new_lista=new Lista();
        $new_lista->nombre=$request->nombre;
        
        if($request->visibilidad == 'TRUE')
            $new_lista->lista_publica=TRUE;
        else
            $new_lista->lista_publica=FALSE;

        $new_lista->user_id=User::find(auth()->id())->id;
        $new_lista->save();

        return redirect()->route('listas.index',$user_name);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        abort_if(Lista::find($id)->user_id != auth()->id(),403,'permiso denegado');
        $lista=Lista::find($id);
        return view('lista.showLista')->with('libros',$lista->libros)->
        with('usr',auth()->user()->name)->with('lista',$lista);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lista)
    {
        $lista_obj=Lista::find($lista);
        $user_name=User::find(auth()->id())->name;
        return view('lista.editLista')->with('usr',$user_name)->with('lista', $lista_obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$lista)
    {
        $request->validate([
            'nombre' => ['required','min:3','max:20'],
            
            'visibilidad' => ['required']
        
        ]);
        abort_if(Lista::find($lista)->user_id != auth()->id(),403,'permiso denegado');

        $user_name=User::find(auth()->id())->name;

        $lista_obj= Lista::find($lista);
        $lista_obj->nombre=$request->nombre;
        if($request->visibilidad == 'TRUE')
             $lista_obj->lista_publica=TRUE;
        else
             $lista_obj->lista_publica=FALSE;
        $lista_obj->save();
        return redirect()->route('listas.index',$user_name);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lista)
    {
        
        $user_name=User::find(auth()->id())->name;

        $lista_obj= Lista::find($lista);

        $lista_obj->delete();
        
        return redirect()->route('listas.index',$user_name);
       
    }

   

    
}
