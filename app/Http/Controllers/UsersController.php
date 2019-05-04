<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UsersController extends Controller{

    public function viewProfile(){
        $user = Auth::user();
        $posts_publicos = $user->getPosts()->where('public', true)->orderBy('created_at', 'desc')->get();
        $posts_privados = $user->getPosts()->where('public', false)->orderBy('created_at', 'desc')->get();
        return view('profile')->with(['user' => $user, 'posts_publicos' => $posts_publicos, 'posts_privados' => $posts_privados]);
    }

    public function searchUsernames(Request $request){
        //Consulta AJAX
        if($request->ajax()){
            $username = $request->query('username');
            $users = User::where('username', 'like', '%'.$username.'%')->orderBy('username')->get();
            return response()->json([
                'users' => $users
            ]);
        }else{
        //Envio de formulario
            $username = $request->query('username');
            return redirect('/user/'.$username);
        }
    }

    public function store(Request $request){
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->first_name = $request->first_name;
        $user->save();
        return view('profile')->with(['user' => $user]);
    }

    public function show($username){
        $user = User::where('username', $username)->get()->first();
        if($user != null){
            $posts_publicos = $user->getPosts()->where('public', true)->orderBy('created_at', 'desc')->get();
            $posts_privados = $user->getPosts()->where('public', false)->orderBy('created_at', 'desc')->get();
            return view('profile')->with(['user' => $user, 'posts_publicos' => $posts_publicos, 'posts_privados' => $posts_privados]);
        }else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request, $username){
        if($request->ajax()){
            $user = User::where('username', $username)->get()->first();
            if($request->file('photo'))
                return $this->editarFotoPerfil($request, $user);
            else
                return $this->editarInformacionPerfil($request, $user);
        }
    }

    private function editarFotoPerfil(Request $request, $user){
        $now = new \Datetime();
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $file_name = $user->id.'-'.$now->format('Y-m-d-H-m-s').'.'.$extension;
        Image::make($file->getRealPath())
            ->fit(480,320)
            ->save('storage/users/'.$file_name);

        $user->photo = $file_name;
        $user->save();
        return $user->photo;
    }

    private function editarInformacionPerfil(Request $request, $user){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->biography = $request->biography;
        $user->save();
        return $user;
    }

    public function destroy($id){
        //
    }
}
