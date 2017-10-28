<?php

use Faker\Generator as Faker;

$factory->define(config('digitalseraph-pages.page_model'), function (Faker $faker) {

    return [
        'title' => $faker->sentence(3, true),
        'sub_title' => $faker->sentence(6, true),
        'body' => $faker->paragraphs(4, true),
        'active' => $faker->boolean(70),
        'parent_id' => function () {
            return factory(config('digitalseraph-pages.page_model'))->create()->id;
        },
        'priority' => 0,
        'created_by' => function () {
            return config('digitalseraph-pages.admin_user_model')::all()->random()->id;
        },
        'modified_by' => function () {
            return config('digitalseraph-pages.admin_user_model')::all()->random()->id;
        },
    ];
});
