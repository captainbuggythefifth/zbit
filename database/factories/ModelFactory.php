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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username'  => $faker->unique()->word,
        'dob'   => Carbon\Carbon::parse('July 9 1990'),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'country_id' => App\Country::all()->random()->id,
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {


    return [
        'user_id' => App\User::all()->random()->id,
        'content' => $faker->paragraph(5),
        'live'      => $faker->boolean(70),
        'post_on'   => Carbon\Carbon::parse('+1 week'),
    ];
});
