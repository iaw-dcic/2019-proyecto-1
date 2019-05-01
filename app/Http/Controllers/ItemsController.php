<?php

namespace App\Http\Controllers;
use App\Thing;
use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function show(Thing $thing)
    {
        return view('items.show',compact('thing'));
    }

    public function store($things){

        request()->validate([
            'title' => ['required', 'min:2', 'max:155'],
            'fecha' => ['required','date_format:Y-m-d'],
            'cantDias' => ['required']
        ]);
    
        $item = new Item;
        $item->thing_id = $things;
        $item->title = request('title');
        $item->cantDias = request('cantDias');
        $item->fecha = request('fecha');
        

        $item->save();

        return redirect('/things'); 
    }

    public function destroy(Item $item){
        $item->delete();
        return redirect('/things'); 
    }
    public function edit(Item $item){
        return $item;
        return redirect('item.edit',compact('item')); 
    }

    public function update(Item $item){
        $item->title = request('title');
        $item->cantDias = request('cantDias');
        $item->fecha = request('fecha');
        $item->save();
        return redirect('/things'); 

    }
}
