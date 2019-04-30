<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;
use App\Genero;
use App\Rules\validarGeneroFiltro;
use App\Rules\validarOrdenFiltro;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/home');
    }

    public function home()
    {
        $generos = Genero::get('genre');
        $listas = Lista::where('visibility', true)->orderBy('created_at', 'desc')->take(50)->get(['id', 'listname','likes','views']);
        return view('home', ['generos' => $generos, 'listas' => $listas]);
    }

    public function filter(Request $request){
        
        $request->validate([
            'genre' => ['required','string','max:255',new validarGeneroFiltro],
            'orderby' => ['required','string','max:255',new validarOrdenFiltro],
        ]);

        $data = $request->all();
        $generos = Genero::get('genre');

        if('all'==$data['genre']){
            if('recent'==$data['orderby']){
                $listas = Lista::where('visibility', true)->orderBy('created_at', 'desc')->take(50)->get(['id', 'listname','likes','views']);
            }
            else{
                if('likes'==$data['orderby']){
                    $listas = Lista::where('visibility', true)->orderBy('likes', 'desc')->take(50)->get(['id', 'listname','likes','views']);
                }
                else{
                    if('views'==$data['orderby']){
                        $listas = Lista::where('visibility', true)->orderBy('views', 'desc')->take(50)->get(['id', 'listname','likes','views']);
                    }
                }
            }

        }else{
            if('recent'==$data['orderby']){
                $listas = Lista::where('visibility', true)->where('genre',$data['genre'])->orderBy('created_at', 'desc')->take(50)->get(['id', 'listname','likes','views']);
            }
            else{
                if('likes'==$data['orderby']){
                    $listas = Lista::where('visibility', true)->where('genre',$data['genre'])->orderBy('likes', 'desc')->take(50)->get(['id', 'listname','likes','views']);
                }
                else{
                    if('views'==$data['orderby']){
                        $listas = Lista::where('visibility', true)->where('genre',$data['genre'])->orderBy('views', 'desc')->take(50)->get(['id', 'listname','likes','views']);
                    }
                } 
            }
        }

        return view('home', ['generos' => $generos, 'listas' => $listas]);
    }
}
