<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'content' => $faker->text,
        'cover' => $faker->image(
            public_path('storage/news'),
            600,
            600,
            'News',
            false
        ),
    ];
});
