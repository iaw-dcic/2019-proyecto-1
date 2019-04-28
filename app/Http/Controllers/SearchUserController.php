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

        $userSearch = User::where('name', 'LIKE', '%' . $search . '%')->get();
        
        return view('pages.search')-> with('users',$userSearch);
    }

    public function getUserListings($userId)
    {
        
        $user = User::where('id', $userId)->first();
       
        $userListings = Listing::where('user_id', $userId)->get();

        $data = [
            'listings'  => $userListings,
            'listOwnerName'   =>  $user->name,
        ];

        return view('listings.listing-index')->withData($data);
    }
}
