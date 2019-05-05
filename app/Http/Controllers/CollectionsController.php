<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = new Collection();
        if(request('public_status')=='on'){
            $collection->public_status = '1';
        }else{$collection->public_status = '0';}
        $collection->user_id = Auth::user()->id;
        $collection->name = request('name');
        $collection->description = request('description');
        $collection->save();
        $data = [
            "operation" => "Create Collection",
            "description" => "Your collection was created successfully.",
        ];
        return view('success')->withData($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        if (!Auth::guest() && Auth::user()->id==$collection->user_id)
            return view('collections.edit')->withCollection($collection);
        else {
            $data = [
                "error_type" => "Edit collection",
                "description" => "You can't edit other people's collections.",
            ];
            return view('error')->withData($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $collection->name = $request->name;
        $collection->description = $request->description;
        if(request('public_status')=='on'){
            $collection->public_status = '1';
        }else{$collection->public_status = '0';}
        $collection->save();
        $data = [
            "operation" => "Edit Collection",
            "description" => "Your collection was edited successfully.",
        ];
        return view('success')->withData($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        if (Auth::user()->id==$collection->user_id){
            $collection->delete();
        }
        $data = [
            "operation" => "Delete Collection",
            "description" => "Your collection was deleted successfully.",
        ];
        return view('success')->withData($data);
    }

    public function confirmDelete($id){
        $collection = Collection::find($id);
        if (!($collection === NULL)){
            if (!Auth::guest() && Auth::user()->id == ($collection->user_id))
                return view('collections.delete')->withCollection($collection);
            else {
                $data = [
                    "error_type" => "Delete collection",
                    "description" => "You can't delete othe people's collections.",
                ];
                return view('error')->withData($data);
            }
        }
        else{
            $data = [
                "error_type" => "Delete collection",
                "description" => "The collection you're trying to delete doesn't exist.",
            ];
            return view('error')->withData($data);
        }
    }
}
