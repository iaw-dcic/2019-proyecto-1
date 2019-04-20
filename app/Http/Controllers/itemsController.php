<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class itemsController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('Items\items',compact('items'));
    }
}
