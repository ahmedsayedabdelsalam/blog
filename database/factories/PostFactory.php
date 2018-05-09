<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->text($maxNbChars = 200),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
