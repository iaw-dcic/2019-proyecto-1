<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller{
    protected $redirectTo = '/home';

    public function index(){
        return Post::paginate(9);
    }

    public function store(Request $request){
        $this->middleware('auth');
        $this->validarDatosPost($request);
        DB::beginTransaction();
        try{
            $post = $this->crearPost($request);
            $user = Auth::user();
            $post->save();
            $this->crearImagenes($request, $user, $post);
            DB::commit();
        }catch(\Exception $ex){
            DB::rollback();
            abort(500, '500 Internal Server Error');
        }
        return back();
    }

    private function crearPost(Request $request){
        $now = new \Datetime();
        $post = new Post();
        $post->description = $request->descripcion;
        $post->user_id = Auth::user()->id;
        if($request->public)
            $post->public = true;
        else
            $post->public = false;
        $post->created_at = $now->created_at = $now->format('Y-m-d H:m:s');
        return $post;
    }

    private function crearImagenes(Request $request, User $user, Post $post){
        $files = $request->file('fotos');
        $i = 0;
        foreach($files as $file){
            //$this->validarImagenes($file);

            Cloudder::upload($file->getRealPath());
            $result = Cloudder::getResult();
            $photo_id = $result['public_id'];
            $photo_url = $result['secure_url'];

            $photo = new Photo();
            $photo->post_id = $post->id;
            $photo->photo_id = $photo_id;
            $photo->photo_url = $photo_url;
            $photo->save();
        }
    }

    private function validarDatosPost(Request $request){
        return $request->validate([
            'descripcion' => 'required|max:255',
            'public' => 'required'
        ]);
    }

    private function validarImagenes($file){
        return Validator::make($file, 'image');
    }

    public function show(Request $request, $id){
        if($request->ajax()){
            $post = Post::find($id);
            $user = User::find($post->user_id);
            $photos = $post->getPhotos()->get();
            return view('partials.post.post')->with(['post' => $post, 'user' => $user, 'photos' => $photos]);
        }
        return abort(403, 'Unauthorized action.');
    }

    public function update(Request $request, $id){
        $this->middleware('auth');

        $validator = validarDatosPost($request);
        if($validator->fails())
            return abort(400, '400 Bad request');

        $post = Post::find($id);
        $post_user = User::find($post->user_id);
        if($post_user->id == Auth::user()->id){
            $post->description = $request->descripcion;
            if($request->public)
                $post->public = true;
            else
                $post->public = false;
            $post->save();
        }
        return back();
    }

    public function destroy($id){
        $this->middleware('auth');
        DB::beginTransaction();
        try{
            $post = Post::find($id);
            $post_user = User::find($post->user_id);
            if($post_user->id == Auth::user()->id){
                $imagenes = Photo::where('post_id', $post->id)->get();
                foreach($imagenes as $image){
                    Cloudder::delete($image->photo_id);
                    Photo::destroy($image->id);
                }
                Post::destroy($id);
            }
            DB::commit();
        }catch(\Exception $ex){
            DB::rollback();
            abort(500, '500 Internal Server Error');
        }
        return back();
    }
}
