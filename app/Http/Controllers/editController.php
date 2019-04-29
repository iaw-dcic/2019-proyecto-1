<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class editController extends Controller
{
    protected function edit(Request $request){

        $id = Auth::user()->id;

        

        //validar información
        $validatedData = $request->validate([
            'nick' => 'max:10',
            'name' => 'max:20',
            //'password' => 'max:255| min:8',
        ]);

        //dd($request->all());

        //buscar en la base de datos para modificar
        if($request->nick != null)
            $user = User::where('id', $id)->update(['nick' => $request->nick]);

        if($request->name != null)
            $user = User::where('id', $id)->update(['name' => $request->name]);

        if($request->password != null)
            $user = User::where('id', $id)->update(['password' => Hash::make($request->password)]);
        

        return view('edit');
    }
}
