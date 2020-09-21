<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $posts = App\Post::pluck('id')->toArray();
    return [
        'post_id' => $faker->randomElement($posts),
        'comment_name' => $faker->word(),
        'comment_email' => $faker->unique()->safeEmail,
        'comment_content' => $faker->paragraph(),
    ];
});
