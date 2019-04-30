<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Listbook\ListElement;
use Faker\Generator as Faker;

$factory->define(ListElement::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'user_list_id' => rand(1,30),
    ];
});
