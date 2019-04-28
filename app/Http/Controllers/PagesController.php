<?php

namespace App\Http\Controllers;

use App\Game;
use Auth;

class PagesController extends Controller
{

    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('auth', ['except' => ['home', 'about', 'games', 'profile','getUserProfile','searchlisting']]);
      // $this->middleware(['auth', 'verified']); 
    }

    public function home()
    {
        return view('pages.home');
    }

    public function about() 
    {
        return view('pages.about');
    }

    public function games()
    {
        return view('pages.games');
    }

    public function searchlisting() 
    {
        return view('listings.listing-search');
    }

    /*public function profile()
    {
        if ($user = Auth::user()) {
            $user = auth()->user();
            $userGames = Game::where('user_id', $user->id)->get();
            $arrayOfGamesTitle = [];
            foreach ($userGames as $game) {
                array_push($arrayOfGamesTitle, $game->title);
            }

            $data = [
                'user'  => $user,
                'userGames'   => implode(" - ", $arrayOfGamesTitle),
            ];

            return view('pages.profile')->with('data', $data);
        } else {
            alert()->info('Atencion!', 'Tenes que iniciar sesión o registrarte para ver tu perfil.');
            return redirect()->guest('/login');
        }
    }*/

    

}
