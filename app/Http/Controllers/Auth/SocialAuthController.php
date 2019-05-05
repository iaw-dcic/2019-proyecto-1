<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallBack($provider)
    {
        $user = Socialite::driver($provider)->user();

        /*
        $authUser=User::where('provider_id',$user->id)->first();

        if($authenticatedUser)
        {
            $authenticatedUser=$authUser;
        }
        else
        {
            $authenticatedUser=User::create([
                'name'=>$user->name,
                'provider_id'=>$user->id,
                'provider'=>$provider,
                'email'=>$user->email
            ]);
        }
        */

        $authUser=User::firstOrNew(['provider_id'=>$user->id]);

        $authUser->name=$user->name;
        $authUser->email=$user->email;
        $authUser->provider=$provider;

        $authUser->save();

        auth()->login($authUser);

        return reirect('/');
    }
}