<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modules\LessonApi\Tag::truncate();

        factory(Modules\LessonApi\Tag::class, 20)->create();

    }
}
