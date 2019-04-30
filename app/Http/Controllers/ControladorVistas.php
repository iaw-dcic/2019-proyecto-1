<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Series;
use App\User;
use App\ListaUsuarios;

class ControladorVistas extends Controller
{
	public function index()
	{
		$lista = ListaUsuarios::where('publica','Si')->get();
		return view('generales.index', ['lista'=> $lista]);
	}

	public function miPerfil(Request $request)
	{
		$user=User::find($request -> id);
		$serie=$user->series;
		//$serie = orderBy('id', 'DESC')->paginate(3);
		$lista = $user->listas;
		return view('perfil.miPerfil', ['serie'=> $serie], ['lista'=> $lista]);
    }

  public function editarPerfil()
	{
		return view('perfil.editarPerfil');
	}

	public function perfilPublico()
	{
		return view('perfil.perfilPublico');
	}
}