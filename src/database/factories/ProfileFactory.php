<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function ($faker) {
    return [
        'name' => $faker->firstName,
        'lastname' => $faker->lastname,
    ];
});
