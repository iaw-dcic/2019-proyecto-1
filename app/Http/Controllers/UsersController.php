<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Photo;
use App\Post;
use Illuminate\Support\Facades\Auth;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller{

    public function viewProfile(){
        $user = Auth::user();
        if($user != null){
            $posts_publicos = $user->getPosts()->where('public', true)->orderBy('created_at', 'desc')->get();
            $posts_privados = $user->getPosts()->where('public', false)->orderBy('created_at', 'desc')->get();
            return view('profile')->with(['user' => $user, 'posts_publicos' => $posts_publicos, 'posts_privados' => $posts_privados]);
        }
        return redirect('login');
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
            if($username != null && $username != '')
                return redirect('/user/'.$username);
            else
                return redirect('/');
        }
    }

    public function show($username){
        $user = User::where('username', $username)->get()->first();
        if($user != null){
            $posts_publicos = $user->getPosts()->where('public', true)->orderBy('created_at', 'desc')->get();
            $posts_privados = null;
            if(Auth::user() != null && $user->id == Auth::user()->id)
                $posts_privados = $user->getPosts()->where('public', false)->orderBy('created_at', 'desc')->get();
            return view('profile')->with(['user' => $user, 'posts_publicos' => $posts_publicos, 'posts_privados' => $posts_privados]);
        }else{
            return redirect()->route('home');
        }
    }

    public function update(Request $request, $username){
        $this->middleware('auth');
        if($request->ajax()){
            $user = User::where('username', $username)->get()->first();
            if($user->id == Auth::user()->id){
                if($request->file('photo'))
                    return $this->editarFotoPerfil($request, $user);
                else
                    return $this->editarInformacionPerfil($request, $user);
            }else{
                abort(403, 'Unauthorized action.');
            }
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    private function editarFotoPerfil(Request $request, $user){
        DB::beginTransaction();
        try{
            $file = $request->file('photo');
            Cloudder::upload($file->getRealPath());
            $result = Cloudder::getResult();
            $photo_id = $result['public_id'];
            $photo_url = $result['secure_url'];
            $user->photo_id = $photo_id;
            $user->photo_url = $photo_url;
            $user->save();
            DB::commit();
            return $user->photo;
        }catch(\Exception $ex){
            abort(500, 'Internal server error');
            DB::rollback();
        }
        return null;
    }

    private function editarInformacionPerfil(Request $request, $user){
        DB::beginTransaction();
        try{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->biography = $request->biography;
            $user->save();
            DB::commit();
            return $user;
        }catch(\Exception $ex){
            abort(500, 'Internal server error');
            DB::rollback();
        }
        return null;
    }

    public function destroy($id){
        $this->middleware('auth');
        DB::beginTransaction();
        try{
            if(Auth::user()->id == $id){
                $user = User::find($id);
                if($user != null){
                    Auth::logout();
                    $posts = Post::where('user_id', $id)->get();
                    foreach($posts as $post)
                        Photo::where('post_id', $post->id)->delete();
                    Post::where('user_id', $id)->delete();
                    User::find($id)->delete();
                    DB::commit();
                    return redirect('home');
                }
            }
        }catch(\Exception $ex){
            abort(500, 'Internal server error');
            DB::rollback();
        }
        return abort(403, 'Unauthorized action.');
    }
}
