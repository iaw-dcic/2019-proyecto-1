<?php

namespace App\Http\Middleware;

use Closure;
use App\Game;
use Auth;

class CheckGamePrivacy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $gameId = $request->route('game');

        $game = Game::find($gameId)->first();

        $gameListings = $game->listings()->get();
        $userArray = [];
        foreach ($gameListings as $listing) {
            array_push($userArray,$listing->user_id);
        }

        if (!in_array(Auth::user()->id,$userArray) & (Auth::check())) { //Usuario no autorizado
            return redirect('401'); 
        }

        //Usuario autorizado
        return $next($request);
    }
}
