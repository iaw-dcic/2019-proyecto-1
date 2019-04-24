<?php

namespace App\Http\Middleware;

use Closure;
use App\Lista;
use Auth;


class CheckBookPrivacy
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
       $id = $request->route()->parameter('list');
       $lista = Lista::find($id);

       if(Auth::user()->id !== $lista->user_id && $lista->public_list==0){

          return redirect()->route('home');
       }


        return $next($request);
    }
}
