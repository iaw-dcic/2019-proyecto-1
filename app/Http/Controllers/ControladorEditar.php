<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ControladorEditar extends Controller
{
	public function editar()
	{
		return view('editar');
    }
}