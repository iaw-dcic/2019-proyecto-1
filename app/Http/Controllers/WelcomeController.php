<?php


namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Lista;
use App\Item;
class WelcomeController extends Controller
{
// /**Index se va a referir a nuestro modulo de usuario, cuya logica va a estar encapsulada en UserController  */
// public function index(){

//     //usoEloquentModel para obtener la tabla de usuarios
//     $lists = Lista::orderBy('created_at','desc')->get();

//     foreach($lists as $list){
//         $users = [
//             'user' => User::where('id','=',$list->user_id),
//         ];

//     }


//     //A la vista le paso un arreglo asociativo, donde cada fila va a ser (llave,valor)
//     return view('welcome', [
//         'lists' => $lists,
//         'users' => $users,
//     ]);
// }

/**Index se va a referir a nuestro modulo de usuario, cuya logica va a estar encapsulada en UserController  */
public function index(){

        //usoEloquentModel para obtener la tabla de listas
        $lists = Lista::orderBy('created_at','desc')->get();

        $items = Item::all();

        //A la vista le paso un arreglo asociativo, donde cada fila va a ser (llave,valor)
        return view('welcome', [
            'lists' => $lists,
            'items' => $items,
        ]);

}

}
