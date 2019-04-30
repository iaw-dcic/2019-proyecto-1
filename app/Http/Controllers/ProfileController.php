<?php

namespace Listbook\Http\Controllers;

use Illuminate\Http\Request;
use Listbook\User;
use Listbook\Traits\UploadTrait;


class ProfileController extends Controller
{
    use UploadTrait;

    public function show(User $user) {
        $userlistsToShow = auth()->id() == $user->id ? $user->lists : $user->publicLists();
        return view('pages.profile',compact('user', 'userlistsToShow'));
    }

    public function update(User $user) {
        if (request()->has('profile_picture')) {
            $this->uploadProfileImage($user);
        }
        $user->update(request(['biography','country']));
        return back();
    }

    private function uploadProfileImage(User $user) {
        $filepath = $this->uploadImage(request()->file('profile_picture'),'profile'.$user->id,'profile-pictures');
        $user->profile_image = $filepath;
        $user->save();
        return back();
    }
}
