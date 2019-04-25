<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicListsController extends Controller
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'public_list_info';

    public function index(){
        $public_list_info= DB::table('public_list_info')->where('public',1);
        return view('publicLists',['listas'=> $public_list_info]);
    }
}
