<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\auto;
use App\Http\Request\CategoriaFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hola desde el controlador";
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


        $Auto=new auto();//nuestro modelo
        $Auto->id=Auth::id();
        if(!empty($request->input('name')) and !empty($request->input('cv')))
        {
             $Auto->auto=$request->input('name');
             $Auto->categoria=$request->input('categoria');
             $Auto->cv=$request->input('cv');
             $Auto->publico=false;
             $Auto->save();
         }
       return redirect('/home');
       
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function BuscarPorCategoria($name)
    {
        return $name;
    }

    /**
     * Show the form for editing the specified resource.
     *Compruebo si esta publico lo hago privado y si esta privado lo hago publico
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nom,$id)
    {
        $idAuto= DB::select('select id from autos where auto=:nom and id=:id', ['nom' => $nom,'id'=>$id]);
        
        if(Auth::user()->id==$idAuto[0]->id) 
        {
            $publico=DB::select ('select publico from autos where auto =:nom and id =:id',['nom'=>$nom,'id'=> Auth::id(),]);
   
            if($publico[0]->publico==0)
            $caters = DB::select('update autos Set publico = :dat where id = :id and auto = :nom', ['dat' => true,'nom'=>$nom,'id'=> Auth::id()]);
            else
                 $caters = DB::select('update autos Set publico = :dat where id = :id and auto = :nom', ['dat' => false,'nom'=>$nom,'id'=>  Auth::id()]);
         }
         else
            abort(403,"403 usuario no autorizado"); 
       
         return redirect('home');
         
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
      //no
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nom,$cate,$id)
    {
        
        $idAuto= DB::select('select id from autos where categoria= :cate and auto=:nom and id=:id', ['nom' => $nom,'cate'=>$cate,'id'=>$id]);
        
        if(Auth::user()->id==$idAuto[0]->id) 
         $caters = DB::select('delete from autos where categoria= :cate and auto=:nom and id=:id', ['nom' => $nom,'cate'=>$cate,'id'=>$id]);
         else
            abort(403,"403 usuario no autorizado");      
        return redirect('home');
         
    }
}
