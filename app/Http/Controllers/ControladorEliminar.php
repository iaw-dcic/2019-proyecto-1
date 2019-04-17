<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ControladorEliminar extends Controller
{
	public function eliminar()
	{
		return view('eliminar');
    }
}