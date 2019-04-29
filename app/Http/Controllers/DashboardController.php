<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use App\Item;
use App\Country;
use App\User;

class DashboardController extends Controller
{
    public function index(){
        $lists = Table::all();
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
                    break;
                }
            }

            $list->items = $items;
        }
        return view('welcome', compact('lists', 'users'));
    }
}
