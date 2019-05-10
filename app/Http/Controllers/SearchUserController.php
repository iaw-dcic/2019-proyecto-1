<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Listing;



class SearchUserController extends Controller
{

    public function searchUser(Request $request)
    {
        $search = $request->get('searchTerm');
        if ($search != null) {

            $listings = Listing::where('title', 'LIKE', '%' . $search . '%')
            ->where('visibility','=','Publica')
            ->orderBy('title', 'asc')
            ->paginate(8);
           
            if (count($listings)>0) {  //If the search term is the name of a existing public listing
                $data= array();
                foreach($listings as $listing) {
                        $ownerName = $listing->user()->first()->name;
                        $data[] = array('listing' => $listing, 'owner' => $ownerName);
                }

                return view('pages.searchIsListing')->withData($data)->withListings($listings);
            } else { //Try to search for name or username

                $users = User::where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('username', 'LIKE', '%' . $search . '%')
                    ->get();

                if (count($users) == 0) {
                        alert()->info('Atencion!', 'La búsqueda no arrojo ningún resultado');
                        return redirect('searchlisting');
                }
                return view('pages.searchIsUser')->withUsers($users);
            }

        } else {
            alert()->info('Atencion!', 'Ingresa el nombre del usuario');
            return redirect('searchlisting');
        }
    }

    public function getUserListings($userId)
    {
    
        $user = User::where('id', $userId)->first();

        $userListings = Listing::where('user_id', $userId)
            ->where('visibility', 'Publica')
            ->get();

        $data = [
            'listings'  => $userListings,
            'listOwnerName'   =>  $user->name,
        ];

        return view('listings.listing-index')->withData($data);
    }
}
