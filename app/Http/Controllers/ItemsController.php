<?php

namespace App\Http\Controllers;

use App\Item;
use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
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
        $id = Auth::user()->id;
        $collections = Collection::where('user_id', $id)->get();
        return view('items.create')->withCollections($collections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item();
        $item->name = request('name');
        $item->description = request('description');
        $item->price = request('price');
        $item->collection_id = request('collection_id');
        $item->save();
        $data = [
            "operation" => "Create Item",
            "description" => "Your item was created successfully.",
        ];
        return view('success')->withData($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $collection = Collection::find($item->collection_id);
        if(!($collection === NULL)){
            if (!Auth::guest() && Auth::user()->id == ($collection->user_id))
                return view('items.edit')->withItem($item);
            else {
                $data = [
                    "error_type" => "Edit item",
                    "description" => "You can't edit other people's items.",
                ];
                return view('error')->withData($data);
            }
        } else {
            $data = [
                "error_type" => "Edit item",
                "description" => "The item you're trying to edit doesn't exist.",
            ];
            return view('error')->withData($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->save();
        $data = [
            "operation" => "Edit Item",
            "description" => "Your item was edited successfully.",
        ];
        return view('success')->withData($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        $data = [
            "operation" => "Delete Item",
            "description" => "Your item was deleted successfully.",
        ];
        return view('success')->withData($data);
    }

    public function confirmDelete(Item $item){
        $collection = Collection::find($item->collection_id);
        if(!($collection === NULL)){
            if (!Auth::guest() && Auth::user()->id == ($collection->user_id))
                return view('items.delete')->withItem($item);
            else {
                $data = [
                    "error_type" => "Delete item",
                    "description" => "You can't delete other people's items.",
                ];
                return view('error')->withData($data);
            }
        } else {
            $data = [
                "error_type" => "Delete item",
                "description" => "The item you're trying to delete doesn't exist.",
            ];
            return view('error')->withData($data);
        }
    }
}
