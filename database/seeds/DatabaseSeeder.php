<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        factory(\App\User::class, 10)->create()->each(function(\App\User $user){
            $url = $user->photo_url;
            Cloudder::upload($url);
            $result = Cloudder::getResult();
            $photo_id = $result['public_id'];
            $photo_url = $result['secure_url'];

            $user->photo_id = $photo_id;
            $user->photo_url  =$photo_url;
            $user->save();
        });

        factory(\App\Post::class, 50)->create();

        factory(\App\Photo::class, 200)->create()->each(function(\App\Photo $photo){
            $url = $photo->photo_url;
            Cloudder::upload($url);
            $result = Cloudder::getResult();
            $photo_id = $result['public_id'];
            $photo_url = $result['secure_url'];

            $photo->photo_id = $photo_id;
            $photo->photo_url = $photo_url;
            $photo->save();
        });;
        factory(\App\Comment::class, 100)->create();
    }
}
