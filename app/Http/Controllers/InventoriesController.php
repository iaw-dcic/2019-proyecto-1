<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;    
use Illuminate\Support\Facades\Session;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();

        return view('inventories.index',compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title'      => 'required','unique:inventories',
       );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('inventories/create')
                ->withErrors($validator);
        } else {
            $inventory = new Inventory;
            $inventory->title       = Input::get('title');
            $inventory->user_id     = Auth::user()->id;
            $inventory->public_status = request('public_status');
            $inventory->save();

            // redirect
            Session::flash('message', 'Successfully created inventory!');
            return Redirect::to('inventories');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return view('inventories.show',compact('inventory'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('inventories.edit',compact('inventory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
     if(Input::get('title')!=$inventory->title){
        $atributes = request()->validate([
            'title'=> ['required','string','unique:inventories'],
        ]);}
    
        $inventory->update(request()->all());
        $inventory->save();
        
        return Redirect::to('inventories');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();

        Session::flash('message', 'Successfully deleted the inventory!');
        return Redirect::to('inventories');
    }
}
