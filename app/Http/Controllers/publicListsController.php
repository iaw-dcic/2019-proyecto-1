<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class publicListsController extends Controller
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'public_list_info';
    protected $InfoListas;


    public function index(){
        $InfoListas= DB::table('public_list_info')->where('public',1)->get();
        return view('publicLists')-> with('listas',$InfoListas);
    }
}
