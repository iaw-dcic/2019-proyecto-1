<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'post_id' => App\Post::all()->random()->id,
        'content' => $faker->realText($maxNbChars = 50),
        'created_at' => $faker->dateTimeBetween('2017-4-27 2:00:49')
    ];
});
