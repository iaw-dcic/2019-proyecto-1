<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ControladorAgregar extends Controller
{
	public function agregar()
	{
		return view('agregar');
    }
}