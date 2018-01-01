<?php

use Faker\Generator as Faker;

$factory->define(Modules\LessonApi\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});
