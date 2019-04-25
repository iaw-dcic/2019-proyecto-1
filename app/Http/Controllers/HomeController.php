<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Genre;
use App\SentimentalSituation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = Country::all();
        $genres = Genre::all();
        $situations = SentimentalSituation::all();
        return view('home', compact('countries', 'genres', 'situations'));
    }

    public function updateUser(Request $request){
        $user = auth()->user();
        $keys = array(
            "name" => "name",
            "birthdate" => "birthdate",
            "country_id" => "country_id",
            "genre_id" => "genre_id",
            "situation_id" => "situation_id",
        );
        foreach($keys as $key){
            if($request->$key != "undefined"){
                $user->$key = $request->$key;
            }
        }

        if($request->file('avatar') != null){
            $extencion = '.' . $request->file('avatar')->getClientOriginalExtension();

            $path = 'storage/app/' . $request->file('avatar')->storeAs(
                'uploads/user-'.$user->id.'', 'avatar-' . $user->id . $extencion . ''
            );

            $user->avatar = $path;
        }
        
        $user->save();
        return back();
    }
}
