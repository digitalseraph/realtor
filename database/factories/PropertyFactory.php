<?php

use Faker\Generator as Faker;
use App\Models\PropertyType;

$factory->define(App\Models\Property::class, function (Faker $faker) {
    $propertyType = PropertyType::inRandomOrder()->first();

    $paymentMonthly = null;
    $paymentMortgageTotal = null;

    if ($propertyType->isRental) {
        $paymentMonthly = $faker->numberBetween(99800, 600000);
    } else {
        $paymentMortgageTotal = $faker->numberBetween(9000000, 100000000);
    }

    return [
        'name' => $faker->sentence(),
        'address1' => $faker->buildingNumber . ' ' . $faker->streetName,
        'address2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'description' => $faker->paragraph,
        'neighborhood' => $faker->words(2, true),
        'payment_monthly' => $paymentMonthly,
        'payment_mortgage_total' => $paymentMortgageTotal,
        'property_type_id' => $propertyType->id,
    ];
});
