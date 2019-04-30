<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auto;
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


        $Auto=new Auto();//nuestro modelo
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caters = DB::select('update autos Set publico = :dat where id = :id', ['dat' => true,'id'=> Auth::id()]);
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
    public function destroy($nom,$cate)
    {
        //DB::table('autos')->where('categoria', '=', $cate)->delete();
         $caters = DB::select('delete from autos where categoria= :cate and auto=:nom', ['nom' => $nom,'cate'=>$cate]);      
        return redirect('home');
         
    }
}
