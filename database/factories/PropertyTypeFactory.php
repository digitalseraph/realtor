<?php

use Faker\Generator as Faker;

$factory->define(App\Models\PropertyType::class, function (Faker $faker) {
    $isRental = $faker->boolean();
    $isMortgage = !$isRental;

    return [
        'name' => $faker->unique()->sentence(),
        'description' => $faker->sentences(4, true),
        'isRental' => $isRental,
        'isMortgage' => $isMortgage,
    ];
});
