<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Profile::class, function ($faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastname,
    ];
});
