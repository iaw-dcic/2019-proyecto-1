<?php

namespace App\Http\Middleware;

use Closure;
use App\Listing;
use Auth;


class CheckListingPrivacy
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
        $listingId= $request->route('listing');
        $listing = Listing::find($listingId);

        if($listing->visibility == 'Publica') {
            if((Auth::user()->id !== $listing->user_id) & (Auth::check())){   //Usuario no autorizado
                return redirect('401'); 
           }
        }
        
         //Usuario autorizado
        return $next($request);
    }
}
