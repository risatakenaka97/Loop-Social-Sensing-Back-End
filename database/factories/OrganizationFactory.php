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

use App\Http\Organization\Model\Organization;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Organization::class, function (Faker\Generator $faker) {
    $type = rand(0, 1);
    $organization = $type === 0 ? 'Community' : 'Department';
    return [
        'name' => $faker->city." $organization",
        'user_id' => rand(1, 50),
        'website' => 'http://'.$faker->domainName,
        'type' => $type,
        'verified' => TRUE,
    ];
});
