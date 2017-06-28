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
        'name' =>$faker->name,
        'email' => $faker->unique()->safeEmail,
        'is_active' =>1,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->text($maxNbChars =50),
        'body' => $faker->text($maxNbChars =400),
        'user_id' =>$faker->numberBetween($min = 55, $max = 100),
        'photo_id' =>$faker->numberBetween($min = 2, $max = 9),
        'category_id' =>$faker->numberBetween($min =1, $max = 3),
        
    ];
});
