<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Page::class, function (Faker $faker) {

    $title = title_case($faker->word(3, true));
    $body = $faker->paragraphs(4, true);
    
    return [
        'title' => $title,
        'sub_title' => title_case($faker->sentence(6, true)),
        'body' => $body,
        'link_text' => str_slug($title),
        'link_description' => str_limit($body, 50),
        'active' => $faker->boolean(70),
        'priority' => 0,
        'created_by' => 1,
        'modified_by' => 1,
    ];
});
