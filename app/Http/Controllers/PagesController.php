<?php

namespace App\Http\Controllers;

use App\Game;
use Auth;
use App\User;
use App\Listing;

class PagesController extends Controller
{

    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['home', 'about', 'games', 'profile','getUserProfile']]);
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

    public function profile()
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
    }

    public function getUserProfile($userName)
    {
            $user = User::where('name', $userName)->first();

            $userListings = Listing::where('user_id',$user->id)->get();

            $arrayOfListingsTitles= [];
            foreach($userListings as $listing) {
                array_push($arrayOfListingsTitles,$listing->title);
            }
            
            $listingsTitles=  implode(" - ", $arrayOfListingsTitles);


            return view('pages.profile',compact('user','listingsTitles'));
           

           /* $userGames = Game::where('user_id', $user->id)->get();
            $arrayOfGamesTitle = [];
            foreach ($userGames as $game) {
                array_push($arrayOfGamesTitle, $game->title);
            }

            $data = [
                'user'  => $user,
                'userGames'   => implode(" - ", $arrayOfGamesTitle),
            ];

            return view('pages.profile')->with('data', $data);*/


    }

    

    public function changeGamesMode($newMode)
    {
        $user = auth()->user();
        $user->gamesMode = $newMode;
        $user->save();
        alert()->success('Listo!', 'Tu lista de juegos ahora esta e n  modo '.$newMode);
        return redirect()->guest('/profile');
    }
}
