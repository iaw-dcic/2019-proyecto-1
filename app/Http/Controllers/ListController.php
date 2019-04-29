<?php

namespace App\Http\Controllers;

use Auth;
use App\MovieList;
use App\Movie;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view('createlist');
    }

    public function store()
    {
        $user = Auth::user();

        $data=request()->all();

        $is_public=0;
        if($data['public']=='on')
                $is_public=1;
                
        $list=MovieList::create([
            'user_id'=>$user->id,
            'name'=> $data['name'],
            'is_public' => $is_public,
        ]);

        $id_list=$list->id;

        return redirect()->route('editlist',[$id_list]);
    }

    public function drop(){
        //
    }

    public function edit($id)
    {
         $list=MovieList::find($id);

        $movies=Movie::where(['list_id' => $id])->get();

        return view('editlist',compact('list','movies'));
    }


}