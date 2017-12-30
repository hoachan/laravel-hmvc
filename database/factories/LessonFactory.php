<?php

use Faker\Generator as Faker;

$factory->define(Modules\Api\Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'body'  => $faker->paragraph(),
    ];
});
