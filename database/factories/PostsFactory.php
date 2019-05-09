<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'description' => $faker->text($maxNbChars = 60),
        'created_at' => $faker->dateTimeBetween('2017-4-27 2:00:49'),
        'public' => $faker->boolean,
        'user_id' => App\User::all()->random()->id
    ];
});
