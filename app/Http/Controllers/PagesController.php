<?php

namespace App\Http\Controllers;

use App\Game;

class PagesController extends Controller
{

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
        $user = auth()->user();
        $userGames = Game::where('user_id', $user->id)->get();
        $arrayOfGamesTitle = [];
        foreach ($userGames as $game) {
            array_push($arrayOfGamesTitle, $game->title);
        }

        $data = [
            'user'  => $user,
            'userGames'   => implode(" - ",$arrayOfGamesTitle),
        ];

        return view('pages.profile')->with('data', $data);
    }
}
