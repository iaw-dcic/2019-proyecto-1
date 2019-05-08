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


    /**Muestra el detalle del usuario. */
    public function show(User $user){
        $user = User::find($user->id);
        if($user == null){
            return response()->view('errors.404',[],404);
        }
        else{
            return view('users.show', [
                'user'=> $user,
            ]);
        }
    }


    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user){
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
    }

}
