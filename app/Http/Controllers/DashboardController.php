<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use App\Item;
use App\Country;
use App\User;
use App\Genre;
use App\SentimentalSituation;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
        $lists = Table::where('estate', '0')->get();
        $countries = Country::all();
        $users = User::all();

        foreach($lists as $list){
            $items = Item::where('table_id', $list->id)->get();

            foreach($items as $item){
                foreach($countries as $country){
                    if($item->country_id == $country->country_id){
                        $item->country_id = $country->country_name;
                        break;
                    }
                }
            }

            foreach($users as $user){
                if($list->user_id == $user->id){
                    $list->user_name = $user->name;
                    $list->user_avatar = $user->avatar;
                    dd(Storage::url($user->avatar));
                    break;
                }
            }

            $list->items = $items;
        }
        return view('welcome', compact('lists', 'users'));
    }

    public function findUsers(Request $request){
        $search = $request->get('term');
      
        $result = User::where('name', 'LIKE', '%'. $search. '%')->get();

        return response()->json($result);
    }

    public function getProfile($user_id){
        $user = User::where('id', $user_id)->first();
        $lists = Table::where('estate', '0')->where('user_id', $user_id)->get();
        $genres = Genre::all();
        $situations = SentimentalSituation::all();
        $countries = Country::all();

        foreach($lists as $list){
            $items = Item::where('table_id', $list->id)->get();

            foreach($items as $item){
                foreach($countries as $country){
                    if($item->country_id == $country->country_id){
                        $item->country_id = $country->country_name;
                        break;
                    }
                }
            }

            $list->items = $items;
        }
        
        return view("home", compact('lists', 'countries', 'genres', 'situations', 'user'));
    }
}
