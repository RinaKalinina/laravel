<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'price' => mt_rand(100, 3000),
        'description' => $faker->text,
        'img' => $faker->image(
            public_path() . '/img/products/',
            616,
            353,
            'Game',
            false
        ),
    ];
});
