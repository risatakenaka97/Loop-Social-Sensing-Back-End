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

/** @var Factory $factory */

use App\Http\User\Model\User;
use Illuminate\Database\Eloquent\Factory;

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'avatar'=> $faker->imageUrl($width = 640, $height = 480, 'cats'),
        'email' => $faker->safeEmail,
        'password' => '111111',
        'organization_id' => rand(1, 10),
        'approved' => TRUE,
        'city' => $faker->city,
        'address' => $faker->address,
        'occupation' => $faker->jobTitle,
    ];
});
