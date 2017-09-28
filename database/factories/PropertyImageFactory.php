<?php

use Faker\Generator as Faker;
use App\Models\Property;

$factory->define(App\Models\PropertyImage::class, function (Faker $faker) {
    $property = App\Models\Property::all()->random(1)->first();
    $propertyId = $property->id;

    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'priority' => 0,
        'url' => $faker->imageUrl($width = 150, $height = 100, 'city'),
        'property_id' => $propertyId,
    ];
});
