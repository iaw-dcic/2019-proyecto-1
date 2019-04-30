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

       if($lista->public_list==0) {
          if(Auth::user()->id !== $lista->user_id){

            return redirect()->route('home');
         }
       }


        return $next($request);
    }
}
