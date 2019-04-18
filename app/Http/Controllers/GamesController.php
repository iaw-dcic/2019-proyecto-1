<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
Use Alert;

class GamesController extends Controller
{
     /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        if (count($user->games) == 0) {
            alert()->success('Listo!','No tenes ningun juego cargado amigo.');
        }
        return view('pages.games')->with('games', $user->games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'title' => 'required',
            'platform' => 'required',
            'rating' => 'required'
        ));

        $game = new Game;

        $game->title = $request->title;
        $game->platform = $request->platform;
        $game->rating = $request->rating;
        $game->user_id = auth()->user()->id;

        $game->save();
        
        alert()->success('Listo!','El juego fue guardado en tu lista.');
        return redirect('games');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);
        return view('games.game-single')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::find($id);  

        //Check for correct user
        if(auth()->user()->id !== $game->user_id) {
            return redirect('/games')->with('error', 'Pagina no autorizada'); //TODO: Ver esto porque no anda, hacer l mismo para eliminar y ver
        }

        return view('games.edit')->with('game', $game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required',
            'rating' => 'required',
            'platform' => 'required'
        ));

        $game = Game::find($id);

        $game->title = $request->title;
        $game->rating = $request->rating;
        $game->platform = $request->company;

        $game->save();

        return redirect('games');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        $game->delete();
        alert()->info('Atención!','El juego fue eliminado');
        return redirect('games');
    }
}
