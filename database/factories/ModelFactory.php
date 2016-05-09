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

$factory->define(Bsquared\PortfolioMember::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => str_random(10),
        'remember_token' => str_random(10),
        'role' => 'member'
    ];
});

$factory->define(Bsquared\PortfolioProfile::class, function (Faker\Generator $faker){
   return [

       'firstName' => $faker->firstName,
       'lastName' => $faker->lastName,
       'aboutMe' => $faker->paragraph
   ];
    
});



