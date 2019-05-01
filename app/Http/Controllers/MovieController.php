<?php

namespace App\Http\Controllers;

use Auth;
use App\MovieList;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        $user=Auth::user();

        $data=request()->all();

        $movie=Movie::create([
            'name' => $data['name'],
            'director' => $data['director'],
            'genre' => $data['genre'],
            'list_id' => $data['list_id'],
        ]);

        $list_id=$data['list_id'];

        return redirect()->route('editlist',[$list_id]);
    }

    public function edit()
    {
        $allData=request()->all();
        $id=$allData['id_movie'];

        $data=request()->validate([
            'genre' => 'required',
            'name' => 'required',
            'director' => 'required',
        ]);
        $movie = Movie::findOrFail($id);
        $movie -> name = $data['name'];
        $movie -> director = $data['director'];
        $movie -> genre = $data['genre'];
        $movie -> save();

        return back();
    }

    public function destroy()
    {
            $data=request()->all();
            $movie=Movie::findOrFail($data['id_movie']);
            $movie->delete();

            return back();
    }

}