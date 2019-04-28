<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class publicListsController extends Controller
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'listas';
    protected $InfoListas;


    public function index(){
        $InfoListas= DB::table('listas')->where('public',1)->get();
        $autores = [];
        foreach($InfoListas as $autor){
            $autoria = User::find($autor->user_id);
            $autores[$autor->name] = $autoria->name;
        }
        
        return view('publicLists', compact('InfoListas', 'autores'));
    }
}
