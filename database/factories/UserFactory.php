<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
    	'user_elixir_id' => str_random(10),
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'mobile' => rand(1000000000, 9999999999),
        'email' => $faker->unique()->safeEmail,
        'is_verified' => 0,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});
