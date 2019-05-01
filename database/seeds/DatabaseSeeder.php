<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){


        factory(\App\User::class, 3)->create()->each(function(\App\User $user){
            $url = $user->photo;
            $file = file($url);
            file_put_contents(public_path('storage\\users\\').$user->id.$user->username.'.jpg', $file);
            $user->photo = $user->id . $user->username . '.jpg';
            $user->save();
        });

        factory(\App\Post::class, 5)->create();

        factory(\App\Photo::class, 20)->create()->each(function(\App\Photo $photo){
            $url = $photo->photo_url;
            $file = file($url);
            $post = \App\Post::find($photo->post_id);
            file_put_contents(public_path('storage\\photos\\').$post->id.$photo->id.'.jpg', $file);
            $photo->photo_url = $post->id . $photo->id . '.jpg';
            $photo->save();
        });;
        factory(\App\Comment::class, 100)->create();
    }
}
