<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Genre;
use App\SentimentalSituation;
use App\Table;
use App\Item;

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
        $user = auth()->user();
        $countries = Country::all();
        $genres = Genre::all();
        $situations = SentimentalSituation::all();
        $lists = Table::where('user_id', $user->id)->get();


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

        return view('home', compact('countries', 'genres', 'situations', 'lists'));
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

    public function createList(Request $request){
        $user = auth()->user();
        Table::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description,
            'estate' => $request->privacity,
        ]);
        return back();
    }

    public function editList(Request $request){
        $list = Table::where('id', $request->id)->get()->first();

        $keys = array(
            "name" => "name",
            "description" => "description",
            "estate" => "estate",
        );
        
        foreach($keys as $key){
            $list->$key = $request->$key;
        }

        $list->save();
        return back();
    }
    

    public function deleteList($list_id){
        Table::where('id', $list_id)->delete();;
        Item::where('table_id', $list_id)->delete();
        return back();
    }

    public function getCountries(){
        $countries = Country::all();
        exit(json_encode($countries));
    }

    public function createItem(Request $request){
        Item::create([
            'table_id' => $request->table_id,
            'name' => $request->name,
            'author' => $request->author,
            'editorial' => $request->editorial,
            'publication_date' => $request->publication_date,
            'country_id' => $request->country_id,
            'synopsis' => $request->synopsis,
        ]);
        return back();
    }

    public function deleteItem(Request $request){
        Item::where('id', $request->item_id)->delete();
    }

    public function editItem(Request $request){
        $item = Item::where('id', $request->item_id)->get()->first();

        $keys = array(
            "name" => "name",
            "author" => "author",
            "editorial" => "editorial",
            "publication_date" => "publication_date",
            "country_id" => "country_id",
            "synopsis" => "synopsis",
        );
        
        foreach($keys as $key){
            $item->$key = $request->$key;
        }

        $item->save();
        return back();
    }
}
