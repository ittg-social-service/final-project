<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->numberBetween($min = 0, $max = 13270500),
        'name' => $faker->name,
        'first_lastname' => $faker->lastName,
        'second_lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => 1231231231,
        'avatar' => 'avatars/default.png',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Activity::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'description'=> $faker->text($maxNbChars = 200),

    ];
});
