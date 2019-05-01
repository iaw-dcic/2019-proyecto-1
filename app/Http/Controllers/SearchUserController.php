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
            
            $users = User::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('username', 'LIKE', '%' . $search . '%')
                ->get();

            if (count($users) == 0) {
                alert()->info('Atencion!', 'No encontramos ningún usuario con ese nombre');
                return redirect('searchlisting');
            }

            return view('pages.search')->withUsers($users);
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
