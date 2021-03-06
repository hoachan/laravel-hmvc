<?php

use Faker\Generator as Faker;

$factory->define(Modules\LessonApi\Lesson::class, function (Faker $faker) {
    return [
        'title'         => $faker->sentence(),
        'body'          => $faker->paragraph(),
        'some_bool'     => $faker->boolean(),
    ];
});
