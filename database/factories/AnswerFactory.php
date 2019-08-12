<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;
use App\User;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraphs(rand(1,3), true),
        'votes_count' => rand(-10,10),
        'user_id' => User::pluck('id')->random()
    ];
});
