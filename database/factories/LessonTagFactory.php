<?php

use Faker\Generator as Faker;

use Modules\LessonApi\Lesson;
use Modules\LessonApi\Tag;

$factory->define(Modules\LessonApi\Tag::class, function (Faker $faker) {
    
    $lessonIds  = Lesson::Select('id')->get()->toArray();
    $tagIds     = Tag::Select('id')->get()->toArray();
    return [
        'name' => $faker->word
    ];
});
