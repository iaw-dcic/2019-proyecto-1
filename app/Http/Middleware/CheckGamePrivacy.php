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

        $algo = $game->listings()->get();
        $array = [];
        foreach ($algo as $alguito) {
            array_push($array,$alguito->user_id);
        }

        if (!in_array(Auth::user()->id,$array) & (Auth::check())) { //Usuario no autorizado
            return redirect('401'); //CAMBIAR RUTA
        }
        //Usuario autorizado
        return $next($request);
    }
}
