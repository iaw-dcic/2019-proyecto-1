<?php

use Faker\Generator as Faker;

$factory->define(\App\Photo::class, function (Faker $faker) {
    return [
        'photo_url' => $faker->imageUrl(640,480),
        'post_id' => App\Post::all()->random()->id
    ];
});
