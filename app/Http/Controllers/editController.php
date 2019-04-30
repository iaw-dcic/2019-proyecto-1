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
            'nick' => ['string','max:10'],
            'name' => ['string','max:40'],
            'password' => ['string', 'min:8','max:255'],
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
