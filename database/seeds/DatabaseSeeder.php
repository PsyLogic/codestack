<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;
use App\Answer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 3)
            ->create()
            ->each(function($user) {
                $user->questions()
                    ->saveMany(factory(Question::class, rand(1,6))->make())
                    ->each(function($question) {
                        $question->answers()->saveMany(factory(Answer::class, rand(0,5))->make());
                    });
            });
    }
}
