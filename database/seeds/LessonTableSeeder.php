<?php

use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Modules\LessonApi\Lesson::truncate();

        factory(Modules\LessonApi\Lesson::class, 20)->create();

    }
}
