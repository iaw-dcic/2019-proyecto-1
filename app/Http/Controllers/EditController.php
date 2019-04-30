<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class EditController extends Controller
{
    //

  

    protected function edit()
    {
        $user = User::where('id', auth()->id())->get();
        $users = $user -> first();
        return view('auth.edit',compact('users'));
    }
    
    protected function update(User $user){
        
        request()-> validate([
          
            'apellido' => ['required', 'string', 'max:255'],
            'name' =>  ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            
        ]);

        $user -> update(request(['apellido']));
        $user -> update(request(['name']));
        $user -> update(request(['email']));
        $user -> save();

      
         return redirect('/');
    }
}
