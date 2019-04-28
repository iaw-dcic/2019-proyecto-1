<?php

use Faker\Generator as Faker;

$factory->define(App\Lista::class, function (Faker $faker) {
    /**Especifico los atributos que quiero q se generen de forma aleatoria */
    return [
        'name' => $faker->sentence(3) //para que se generen oraciones con solo 3 palabras
    ];
});
