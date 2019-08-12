<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(2,3), ".")),
        'body' => $faker->paragraph(rand(1,5)),
        'views_count' => rand(0,100),
        // 'answers_count' => rand(0,15),
        'votes_count' => rand(-10,100),
    ];
});
