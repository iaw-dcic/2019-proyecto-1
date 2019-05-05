<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller{
    protected $redirectTo = '/home';

    public function index(){
        return Post::paginate(9);
    }

    public function store(Request $request){
        $this->middleware('auth');
        $post = $this->crearPost($request);
        $user = Auth::user();
        $this->crearImagenes($request, $user, $post);
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
        $post->save();
        return $post;
    }

    private function crearImagenes(Request $request, User $user, Post $post){
        $files = $request->file('fotos');
        $i = 0;
        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();
            $file_name = $user->id.'-'.$post->id.'-'.$i.'.'.$extension;
            $i++;
            Image::make($file->getRealPath())->fit(640,480)->save('storage/photos/'.$file_name);
            $photo = new Photo();
            $photo->post_id = $post->id;
            $photo->photo_url = $file_name;
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
        $post = Post::find($id);
        $post_user = User::find($post->user_id);
        if($post_user->id == Auth::user()->id){
            $imagenes = Photo::where('post_id', $post->id)->get();
            foreach($imagenes as $image)
                Photo::destroy($image->id);
            Post::destroy($id);
        }
        return back();
    }
}
