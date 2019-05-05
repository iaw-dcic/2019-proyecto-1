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

    public function show($id)
    {
        $list = MovieList::find($id);

        $movies=Movie::where(['list_id'=>$id])->get();

        return view('showlist',['list' => $list],['movies'=>$movies]);
    }

    public function store()
    {
        $user = Auth::user();

        $data=request()->all();

        $public=0;
        if(request('visible')==='1')
            $public=1;
                
        $list=MovieList::create([
            'user_id'=>$user->id,
            'name'=> $data['name'],
            'visible' => $public,
        ]);

        $id_list=$list->id;

        return redirect()->route('editlist',[$id_list]);
    }

    public function editmovieslist($id)
    {
        $user=Auth::user();

        $list = MovieList::find($id);

        $movies=Movie::where(['list_id'=>$id])->get();
    
        return view('editlist',['list' => $list],['movies'=>$movies]);

    }

    public function destroy()
    {
       $data=request()->all();

       $id=$data['id_list'];
       $list=MovieList::find($id);
    
       $movies=Movie::where(['list_id'=>$id])->get();
       
       foreach($movies as $movie)
       {
           $movie->delete();
       }
       $list->delete();

       return back();
    }

    public function edit()
    {
        $allData=request()->all();
        $id=$allData['id_list'];

        $data=request()->validate([
            'name' => 'required',
        ]);
        $list = MovieList::findOrFail($id);
        $list -> name = $data['name'];
        $list -> save();

        return back();
    }

    public function toggleList($id){
        $list = MovieList::find($id);
        
        $list->visible=!$list->visible;
        $list -> save();

        return back();
    }

}