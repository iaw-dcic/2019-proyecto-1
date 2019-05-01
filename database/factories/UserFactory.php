<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->password,
        'photo' => $faker->imageUrl($width = 300, $height = 300, $category = 'people'),
        'phone' => $faker->phoneNumber,
        'biography' => $faker->text($maxNbChars = 200),
        'remember_token' => Str::random(10),
    ];
});
