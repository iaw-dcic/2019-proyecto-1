<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Listbook\UserList;
use Faker\Generator as Faker;

$factory->define(UserList::class, function (Faker $faker) {
    return [
        'title' => $faker-> lexify('My list of ??????'),
        'public' => $faker-> boolean($chanceOfGettingTrue = 75),
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'user_id' => rand(1,4),
    ];
});
