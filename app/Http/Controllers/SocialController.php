<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator,Redirect,Response,File;
use Socialite;
class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    public function callback($provider)
    {
               
        $getInfo = Socialite::driver($provider)->user();
         
        $user = $this->createUser($getInfo,$provider);
 
        auth()->login($user);
 
        return redirect()->to('/home');
 
    }
   function createUser($getInfo,$provider){
 
     $user = User::where('provider_id', $getInfo->id)->first();
 
     
     if (!$user) {
         $user = User::create([
             'name' => $getInfo->name,
             'email' => 'no_mail_'.time(),
             'password' => Hash::make(time()),
             'provider' => $provider,
             'provider_id' => $getInfo->id
             ]);
            }
      return $user;
   }
}