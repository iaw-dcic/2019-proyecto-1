<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElementsController extends Controller
{
    public function allElements(){
    	$elements = \App\Element::all();

    	return view('lists', ['elements' => $elements]);
    }

    public function store(){
    	$element = new \App\Element;

    	$element->name = request('title');
    	$element->album = request('album');
    	$element->band = request('band');

    	$element->save();

    	return redirect('/create');
    }
}
