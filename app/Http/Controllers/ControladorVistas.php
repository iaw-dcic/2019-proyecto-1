<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

	public function perfilPublico(Request $request)
	{
		$user=User::find($request -> id);
		$lista = $user->listas;
		return view('perfil.perfilPublico', ['lista'=> $lista]);
	}

	public function agregarSeries(Request $request)
	{
		$lista=ListaUsuarios::find($request->id);
		$user=User::find($lista->idUsuario);
		$serie=$user->series;
		return view ('listas.agregarSeries',['serie'=> $serie],['lista'=> $lista]);
	}
}