<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use JD\Cloudder\Facades\Cloudder;

class PostsController extends Controller{
    protected $redirectTo = '/home';

    public function index(){
        return Post::paginate(9);
    }

    public function store(Request $request){
        $this->middleware('auth');
        DB::beginTransaction();
        try{
            $post = $this->crearPost($request);
            $user = Auth::user();
            $post->save();
            $this->crearImagenes($request, $user, $post);
            DB::commit();
        }catch(\Exception $ex){
            DB::rollback();
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

    public function show($id){
        $post = Post::find($id);
        $user = User::find($post->user_id);
        $photos = Photo::where('post_id', $post->id)->get();
        return view('partials.post.post')->with(['post' => $post, 'user' => $user, 'photos' => $photos]);
    }

    public function update(Request $request, $id){
        $this->middleware('auth');
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
        }
        return back();
    }
}
