<?php

namespace App\Http\Controllers;

use App\Thing;
use App\User;


class ThingsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $misListas = Thing::where('user_id',auth()->id())->get();
        return view('things.show',compact('misListas'));
    }

    /**
     * Show the form for creating a new resource.
     *
    * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('things.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

       request()->validate([
            'title' => ['required', 'min:2', 'max:155']
        ]);
        
        $thing = new thing;
        $thing->title = request('title');
        $thing->user_id = auth()->id();
        if (request('compartir') == 'on'){
            $thing->compartir = true;
        } else   $thing->compartir = false;
        $thing->save();

       
        $misListas = Thing::where('user_id',auth()->id())->get();
       
        return view('things.show',compact('misListas')); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('things.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Thing $thing)
    {
        return view('things.edit',compact('thing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Thing $thing)
    {
        request()->validate([
            'title' => ['required', 'min:2', 'max:155']
        ]);
        $thing -> update(request(['title']));
    
        return redirect('/things'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thing $thing)
    {
        $thing->delete();
        return redirect('/things'); 
    }

   public function addItem(Thing $thing){
           
    return view('things.addItem',compact('thing'));
   }

    
   
}
