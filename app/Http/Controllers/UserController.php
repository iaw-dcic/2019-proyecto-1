<?php

namespace App\Http\Controllers;

use App\User;
use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Auth;


class UserController extends Controller
{
    public function getUserProfile($userName)
    {
        $user = User::where('name', $userName)->first();

        $userListings = Listing::where('user_id', $user->id)->get();

        return view('pages.profile', compact('user', 'userListings'));
    }

    public function update_avatar(Request $request)
    {
        $user = Auth::user();
        $userListings = Listing::where('user_id', $user->id)->get();
        $fileNameToStore = $this->handleFileUpload($request);

        if ($request->hasFile('avatar')) {
            if ($user->avatar != 'default.jpg') {
                Storage::delete('/img/avatars/' . $user->avatar);
            }
            $user->avatar = $fileNameToStore;
        }
        $user->save();
        return view('pages.profile', compact('user', 'userListings'));
    }


    private function handleFileUpload(Request $request)
    {
        $fileNameToStore = 'default.jpg';
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileNameWithExt = time() . '.' . $avatar->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $avatar->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            Image::make($avatar)->save(public_path('/img/avatars/' . $fileNameToStore));
        }
        return $fileNameToStore;
    }
}
