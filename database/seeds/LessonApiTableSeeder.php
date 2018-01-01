<?php

use Illuminate\Database\Seeder;

use Modules\LessonApi\Lesson;
use Modules\LessonApi\Tag;

use Faker\Generator as Faker;

class LessonApiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LessonsTableSeeder::class);

        $this->call(TagsTableSeeder::class);

        $this->callLessonTagTbl();
  
    }

    public function callLessonTagTbl(){
        // reset current database of lesson_tag table
        DB::table('lesson_tag')->truncate();

        $lessonIds  = Lesson::Select('id')->get()->toArray();
        $tagIds     = Tag::Select('id')->get()->toArray();

        foreach($lessonIds as $arrId){
            DB::table('lesson_tag')->insert([
                'lesson_id' => $lessonIds[array_rand($lessonIds)]['id'],
                'tag_id'    => $tagIds[array_rand($tagIds)]['id']
            ]);
        }
    }
}
