<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Manifest;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
