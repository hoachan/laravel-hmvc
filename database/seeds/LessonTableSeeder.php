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

        Modules\Api\Lesson::truncate();

        factory(Modules\Api\Lesson::class, 20)->create();

    }
}
