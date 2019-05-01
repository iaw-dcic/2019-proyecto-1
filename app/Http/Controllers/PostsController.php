<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if($request->ajax()){
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

            /*Codigo que debería ir en commentsController - Ver traits y comunicación de dos controllers*/
            $user = Auth::user();
            $files = $request->file('fotos');
            $i = 0;
            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $file_name = $user->id.'-'.$post->id.'-'.$i.'.'.$extension;
                $i++;
                Image::make($file->getRealPath())
                    ->fit(480,320)
                    ->save('storage/photos/'.$file_name);

                $photo = new Photo();
                $photo->post_id = $post->id;
                $photo->photo_url = $file_name;
                $photo->save();
            }
            return response()->json([
                'post' => $post,
                'username' => $user->username
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $post = Post::find($id);
        $user = User::find($post->user_id);
        $photos = Photo::where('post_id', $post->id)->get();
        return view('partials.post.post')->with(['post' => $post, 'user' => $user, 'photos' => $photos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
}
