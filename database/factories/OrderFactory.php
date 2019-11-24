<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;

$factory->define(Order::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('ru_RU');
    return [
        'title' => $faker->word,
        'description' => $faker->text,
    ];
});
