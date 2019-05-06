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
        EL QUE COMENTA EN EL VIDEO
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
        EL DEL LOGGIN CONTROLLER
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if($user){
            Auth::login($user);
            return redirect()->action('HomeController@index');
        }else{
            return view('auth.register',['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
        }
        */

        $authUser=User::firstOrCreate(['provider_id'=>$user->id]);

        $authUser->name=$user->name;
        $authUser->email=$user->email;
        $authUser->provider=$provider;

        $authUser->save();

        auth()->login($authUser);

        return reirect('/');
    }
}