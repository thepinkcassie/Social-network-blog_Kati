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

    $name=$faker->name;
    $username=$faker->username;

    return [
        'name' => $name,
        'username' => $username,
        'slug'=> str_slug($username),
        'email' => $faker->unique()->safeEmail,
        'avatar' => "{{url('http://placeimg.com/80/80/any')}}",
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
