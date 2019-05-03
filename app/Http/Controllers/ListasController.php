<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\resources\views;
use App\Lista;
use Auth;
use Laracasts\Flash\Flash;

class ListasController extends Controller
{

    //middleware
    public function __construct()
    {
        $this->middleware('auth',['except'=>['show','index']]);
    }
    



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtengo todas las listas publicas de mi app
        $listas= Lista::where('visible',2);
      
        $listas=  $listas->paginate(5);

        //retorno la vista y le paso las listas
        return view ('listas.index',compact('listas'));
    }

    //index para listas privadas (el usuario ya esta logueado)
    public function indexPriv()
    {
        $user_id= Auth::user()->id;
        //obtengo todas las listas publicas de mi app
        $listas= Lista::where('visible',0)->where('user_id',$user_id);
      
        $listas=  $listas->paginate(5);

        //retorno la vista y le paso las listas
        return view ('listas.indexPriv',compact('listas'));
    }



    //search para buscar listas publicas
    public function search(Request $request)
    {
        $search= $request->get('search');
        //obtengo todas las listas publicas de mi app
        $listas= Lista::where('nombre','like','%'.$search.'%')->where('visible',2);
        $listas=  $listas->paginate(5);

        //retorno la vista y le paso las listas
        return view ('listas.index',compact('listas'));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listas.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //2da capa de validacion: si no la pasa me redirige a la misma pagina
        $lista= new Lista(
                 request()->validate([
                        'nombre'=> ['required','min:3'],
                        'descripcion'=> 'required',
                        'visible'=>'required',
                    ],Lista::messages())
                );
        $user_id= Auth::user()->id; 
        
        $lista->user_id= $user_id;    
        $lista->save();

        Flash::success("Lista ".$lista->nombre." ha sido creada con exito! ");

        //si es publica
        if ($request->visible !=0)             
            return redirect('listas/public');
        else
            //si es privada (=0)
            return redirect('listas/private'); 
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //recibo id de la lista a modificar
    public function edit($id)
    {
        //recibo ese objeto
        $lista= Lista::findOrFail($id);

        //CHEQUEO que la lista a modificar sea del usuario actual (el que esta logueado y no otro)
        if (Auth::user()->id  != $lista->user_id){
            Flash::error("URL inválida! ");
            return redirect('/'); 
        }

        //si es valido el id de la lista -> muestro la vista de editar
        //y se lo paso a la vista
        return view('listas/edit',compact('lista','id'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $lista= Lista::findOrFail($id);

        $lista->update(request()->validate([
                           'nombre'=> ['required','min:3'],
                           'descripcion'=> 'required',
                           'visible' => 'min:1',
                      ],Lista::messages()));
        
      

        Flash::success("Lista ".$lista->nombre." ha sido editada con exito! ");

         if ($request->visible !=0)             
            return redirect('listas/public');
        else
            return redirect('listas/private');          
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lista= Lista::findOrFail($id);
        $lista->delete();

        Flash::success("Lista ".$lista->nombre." ha sido eliminada con exito! ");

           //Vuelvo al listado usando un get
           if ($lista->visible !=0)             
           return redirect('listas/public');
       else
           return redirect('listas/private');         
    }
}
