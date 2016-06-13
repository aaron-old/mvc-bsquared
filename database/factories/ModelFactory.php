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

$factory->define(Bsquared\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
        'role' => 'member'
    ];
});

$factory->define(Bsquared\Profile::class, function (Faker\Generator $faker){
   return [

       'firstName' => $faker->firstName,
       'lastName' => $faker->lastName,
       'aboutMe' => $faker->paragraph
   ];
});

$factory->define(Bsquared\Statement::class, function (Faker\Generator $faker){
    return [
        'statement' => $faker->paragraph
    ];
});


