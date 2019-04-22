<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Series;

class ControladorVistas extends Controller
{
	public function index()
	{
		return view('index');
    }
	public function agregar()
	{
		return view('create');
	}
		
	public function editar(Series $series)
	{
		return view('editar');
	}

	public function miPerfil()
	{
		/*Las series se listaran de acuerdo al orden de agregado, es decir, 
		en primer lugar se encontraran las recientemente agregadas
		*/
		$serie = Series::orderBy('id', 'DESC')->paginate(5);
		return view('miPerfil',compact('serie'));
  }
}