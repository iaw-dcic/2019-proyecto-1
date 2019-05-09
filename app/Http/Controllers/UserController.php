<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Item;
use App\Lista;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('show');
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user){
        if(auth()->user()==$user){
            $data = request()->validate([
                'name' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user->id),], //En la busqueda me tiene que ignorar el mail actual del usuario.
                'password' => '',
            ]);

            if($data['password'] != null){
                $data['password'] = bcrypt($data['password']);
            }else{
                //Usamos unset para quitar el indice password del array asociativo de la variable data
                unset($data['password']);
            }


            $user->update($data);

            return redirect('home');
    }else {
        return back();
    }
    }

    public function show($id){
        $user = User::where('id',$id)->first();
        $listas= Lista::where('user_id',$id)->get();
        $items= Item::all();
        return view('users.show',[
            'user' => $user,
            'lists' => $listas,
            'items' => $items,
        ]);
    }

}
